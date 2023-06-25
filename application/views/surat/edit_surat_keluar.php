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
                        <h4 class="card-title">Tambah Nomor Surat</h4>

                        <div class="form-group">
                            <label class="label-control">Nama Surat</label>
                            <input class="form-control" name="nama_surat" id="nama_surat" type="text" value="<?= $surat_keluar['nama_surat_keluar']; ?>" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Tanggal Surat</label>
                            <input type="text" class="form-control datepicker" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_keluar['tanggal_surat_keluar']; ?>" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Keterangan Surat</label>
                            <input class="form-control" name="keterangan_surat" id="keterangan_surat" value="<?= $surat_keluar['keterangan_surat_keluar']; ?>" type="text" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Nomor Surat Pengantar</label>
                            <input class="form-control" name="nomor_surat" id="nomor_surat" value="<?= $surat_keluar['nomor_surat']; ?>" type="text"/>
                        </div>

                        <div class="form-group">
                            <label class="label-control">Nomor Surat Terima kasih</label>
                            <input class="form-control" name="terima_kasih" id="terima_kasih" value="<?= $surat_keluar['terima_kasih']; ?>" type="text"/>
                        </div>

                        <div class="category form-category">
                            <div class="form-footer text-right">
                                <a href="<?= base_url() ?>surat/surat_keluar" class="btn btn-danger btn-fill">Kembali</a>
                                <button type="submit" class="btn btn-success btn-fill">simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>