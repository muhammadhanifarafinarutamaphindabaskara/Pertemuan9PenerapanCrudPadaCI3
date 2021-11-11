<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content">

            <div class="card">
                <div class="card-body">
                    <h4><strong>Edit Data Mahasiswa</strong></h4>
                    <hr>

                    <?php
                    foreach ($mahasiswa as $row) { ?>
                        <?php echo form_open_multipart('mahasiswa/update/'); ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="<?php echo $row->id ?>" class="form-control">
                            <input type="text" name="nama" value="<?php echo $row->nama ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" name="nim" value="<?php echo $row->nim ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="<?php echo $row->tgl_lahir ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>

                            <select class="form-control" name="jurusan">
                                <option value="Informatika" <?php if ($row->jurusan == "Informatika") {
                                                                echo "selected=\"selected\"";
                                                            } ?>>
                                    Informatika</option>
                                <option value="Sistem Informasi" <?php if ($row->jurusan == "Sistem Informasi") {
                                                                        echo "selected=\"selected\"";
                                                                    } ?>>
                                    Sistem Informasi</option>
                                <option value="Manajemen Informatika" <?php if ($row->jurusan == "Manajemen Informatika") {
                                                                            echo "selected=\"selected\"";
                                                                        } ?>>
                                    Manajemen Informatika</option>
                                <option value="Ilmu Komunikasi" <?php if ($row->jurusan == "Ilmu Komunikasi") {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>
                                    Ilmu Komunikasi</option>
                                <option value="Sistem Komputer" <?php if ($row->jurusan == "Sistem Komputer") {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>
                                    Sistem Komputer</option>
                                <option value="Teknik Komputer" <?php if ($row->jurusan == "Teknik Komputer") {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>
                                    Teknik Komputer</option>
                                <option value="Teknik Elektro" <?php if ($row->jurusan == "Teknik Elektro") {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>
                                    Teknik Elektro</option>
                                <option value="Teknik Mesin" <?php if ($row->jurusan == "Teknik Mesin") {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>
                                    Teknik Mesin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" cols="20"><?php echo $row->alamat ?></textarea>
                        </div>
                        <div class=" form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $row->email ?>">
                        </div>
                        <div class=" form-group">
                            <label> No Telpon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $row->no_telp ?>">
                        </div>

                        <a href="<?php echo base_url() . 'mahasiswa/index' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <?php echo form_close(); ?>
                    <?php } ?>

                </div>
            </div>

        </section>
    </div>
</div>