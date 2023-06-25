<section class="page-section">
    <div class="container">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
            <?= $this->session->flashdata('success'); ?>
        <?php endif; ?>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tambah Surat Balasan Kerja Praktek</h2>
            <h3 class="section-subheading text-muted">Isi Form Surat Dibawah:</h3>
        </div>
        <?php echo form_open_multipart(); ?>
        <div class="text-justify pl-5 pr-5">
            <div class="row">
                <div class="col-lg-6">
                    <label>ID Pengajuan</label>
                    <input class="form-control" name="nama_surat" id="nama_surat" type="text" value="<?= set_value('nama_surat'); ?>" />
                </div>
                <?= form_error('nama_surat', '<div class="text-danger">', '</div>'); ?>

                <div class="col-lg-6">
                    <label>Tempat Kerja Praktek</label>
                    <input class="form-control" name="tempat_surat" id="tempat_surat" type="text" value="<?= set_value('tempat_surat'); ?>" />
                </div>
                <?= form_error('tempat_surat', '<div class="text-danger">', '</div>'); ?>

                <div class="col-lg-6 mt-2">
                    <label>Program Studi</label>
                    <select class="form-control" name="prodi_surat" id="prodi_surat" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                        <option disabled selected>Pilih Program Studi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Multimedia Broadcasting">Multimedia Broadcasting</option>
                    </select>
                </div>
                <?= form_error('prodi_surat', '<div class="text-danger">', '</div>'); ?>

                <div class="col-lg-6 mt-2">
                    <label>Tanggal Surat</label>
                    <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" />
                </div>
                <?= form_error('tanggal_surat', '<div class="text-danger">', '</div>'); ?>

                <div class="col-lg-6 mt-3">
                    <label>File Surat <sup class="text-danger">*PDF Recommended! | Max 5MB</sup></label>
                    <input class="form-control" name="file_surat" id="file_surat" type="file" <?= set_value('file_surat'); ?> />
                </div>
                <?= form_error('file_surat', '<div class="text-danger">', '</div>'); ?>
                
            </div>

            <div class="row mt-5">
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-block btn-primary">KIRIM SURAT</button>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-block btn-secondary" href="javascript:window.history.go(-1);">KEMBALI</a>
                </div>
            </div>

            </form>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        
    </div>
</section>