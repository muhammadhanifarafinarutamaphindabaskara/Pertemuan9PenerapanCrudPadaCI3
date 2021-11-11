<?php defined('BASEPATH') or die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->auth->cek_login();
	}

    public function index()
    {
        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data()->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/mahasiswa', $data);
        $this->load->view('template_administrator/footer');
    }

    public function tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan' => $jurusan,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'foto' => $foto

        );

        $this->M_mahasiswa->input_data($data, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function hapus($id)
    {
        $id = array(
            'id' => $id
        );
        $this->M_mahasiswa->hapus_data($id, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function edit($id)
    {
        $id = array('id' => $id);
        $data['mahasiswa'] = $this->M_mahasiswa->edit_data($id, 'tb_mahasiswa')->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/edit_mahasiswa', $data);
        $this->load->view('template_administrator/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');

        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan' => $jurusan,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp
        );

        $id = array(
            'id' => $id
        );

        $this->M_mahasiswa->update_data($id, $data, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function detail($id)
    {
        $this->load->model('M_mahasiswa');

        $detail = $this->M_mahasiswa->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/detail_mahasiswa', $data);
        $this->load->view('template_administrator/footer');
    }

    public function print_file()
    {
        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data('tb_mahasiswa')->result();
        $this->load->view('administrator/print_mahasiswa', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data('tb_mahasiswa')->result();

        $this->load->view('administrator/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_mahasiswa.pdf', array('Attachment' => 0));
    }

    public function excel()
    {
        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data('tb_mahasiswa')->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Nim')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'Jurusan')
            ->setCellValue('F1', 'Alamat')
            ->setCellValue('G1', 'Email')
            ->setCellValue('H1', 'No. Telp');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['mahasiswa'] as $mhs) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor++)
                ->setCellValue('B' . $kolom, $mhs->nama)
                ->setCellValue('C' . $kolom, $mhs->nim)
                ->setCellValue('D' . $kolom, $mhs->tgl_lahir)
                ->setCellValue('E' . $kolom, $mhs->jurusan)
                ->setCellValue('F' . $kolom, $mhs->alamat)
                ->setCellValue('G' . $kolom, $mhs->email)
                ->setCellValue('H' . $kolom, $mhs->no_telp);

            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Mahasiswa.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['mahasiswa'] = $this->M_mahasiswa->get_keyword($keyword);
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/mahasiswa', $data);
        $this->load->view('template_administrator/footer');
    }
}
