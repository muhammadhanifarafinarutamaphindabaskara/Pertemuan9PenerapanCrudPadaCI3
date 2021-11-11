<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <h4><strong>Detail Data Mahasiswa</strong></h4><br>

                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $detail->nama ?></td>
                        </tr>
                        <tr>
                            <th>Nim</th>
                            <td><?php echo $detail->nim ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo $detail->tgl_lahir ?></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td><?php echo $detail->jurusan ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $detail->alamat ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $detail->email ?></td>
                        </tr>
                        <tr>
                            <th>No Telpon</th>
                            <td><?php echo $detail->no_telp ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="90" height="110">
                            </td>

                        </tr>
                    </table>
                    <a href="<?php echo base_url() . 'mahasiswa/index' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                </div>
            </div>
        </section>
    </div>
</div>