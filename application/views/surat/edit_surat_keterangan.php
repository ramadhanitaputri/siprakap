<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php echo form_open_multipart(); ?>
                    <!-- <form id="RegisterValidation" action="" method=""> -->
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Surat Pengantar</h4>

                        <div class="form-group">
                            <label class="label-control">Nama Mahasiswa</label>
                            <input class="form-control" name="nama_surat" id="nama_surat" type="text" value="<?= $surat_keterangan['nama_surat_keterangan']; ?>" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Tempat Kerja Praktek</label>
                            <input class="form-control" name="tempat_surat" id="tempat_surat" type="text" value="<?= $surat_keterangan['tempat_surat_keterangan']; ?>" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Keterangan Surat</label>
                            <input class="form-control" name="keterangan_surat" id="keterangan_surat" value="<?= $surat_keterangan['keterangan_surat_keterangan']; ?>" type="text" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Tanggal Surat</label>
                            <input type="text" class="form-control datepicker" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_keterangan['tanggal_surat_keterangan']; ?>" />
                        </div>

                        <div class="category form-category">
                            <div class="form-footer text-right">
                                <a href="<?= base_url() ?>surat/surat_keterangan" class="btn btn-danger btn-fill">Kembali</a>
                                <button type="submit" class="btn btn-success btn-fill">simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>