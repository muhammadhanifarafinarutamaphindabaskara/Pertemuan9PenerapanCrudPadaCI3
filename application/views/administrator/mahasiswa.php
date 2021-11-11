<div class="content-wrapper">

    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-university"></i> Mahasiswa
        </div>

        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('pesan') ?>

                <!--  -->
                <nav class="navbar navbar-expand-lg navbar-light mb-4">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                            <button class="btn btn-primary mb-2 shadow" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>

                            <a class="btn btn-danger mb-2 ml-2 shadow" href="<?php echo base_url() . 'mahasiswa/print_file' ?>"><i class="fas fa-print fa-sm"></i> Print</a>

                            <div class="btn-group mb-2 ml-2 shadow">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?php echo base_url() . 'mahasiswa/pdf' ?>">PDF</a>
                                    <a class="dropdown-item" href="<?php echo base_url() . 'mahasiswa/excel' ?>">EXCEL</a>
                                </div>
                            </div>

                        </ul>
                        <div class="form-inline my-2 my-lg-0">

                            <?php echo form_open('mahasiswa/search') ?>
                            <input type="text" name="keyword" class="form-control mr-sm-2 shadow" placeholder="Search">
                            <button type="submit" class="btn btn-success shadow">Cari</button>
                            <?php echo form_close() ?>

                        </div>
                    </div>
                </nav>
                <!--  -->


                <table class="table table-striped table-hover" id="dataTable">
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>Tanggal Lahir</th>
                        <th>Jurusan</th>
                        <th>AKSI</th>
                    </tr>

                    <?php
                    $no = 1;

                    foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row->nim ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo date('d M Y', strtotime($row->tgl_lahir)); ?></td>
                            <td><?php echo $row->jurusan ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>mahasiswa/detail/<?php echo $row->id; ?>" class="btn btn-sm btn-success" title="detail"><i class="fa fa-search-plus"></i></a>
                                <a href="<?php echo base_url() ?>mahasiswa/edit/<?php echo $row->id; ?>" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                                <a onclick="javascript: return confirm('Apakah anda yakin akan dihapus?');" href="<?php echo base_url() ?>mahasiswa/hapus/<?php echo $row->id; ?>" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
                
            </div>

        </div>

    </div>
</div>



<!-- Modal Tambah Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('mahasiswa/tambah_aksi'); ?>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nim</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="jurusan" required>

                        <option value="informatika">Informatika</option>
                        <option value="sistem informasi">Sistem Informasi</option>
                        <option value="manajemen informatika">Manajemen Informatika</option>
                        <option value="ilmu komunikasi">Ilmu Komunikasi</option>
                        <option value="sistem komputer">Sistem Komputer</option>
                        <option value="teknik komputer">Teknik Komputer</option>
                        <option value="teknik elektro">Teknik Elektro</option>
                        <option value="teknik mesin">Teknik Mesin</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" cols="20" rows="0" required></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>