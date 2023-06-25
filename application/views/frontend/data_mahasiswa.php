<section class="page-section">
    <div class="container">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
            <?= $this->session->flashdata('success'); ?>
        <?php endif; ?>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Data Mahasiswa Kerja Praktek</h2>
            <h3 class="section-subheading text-muted">Lengkapi Data Diri Dibawah:</h3>
        </div>
        <div class="text-justify pl-5 pr-5">
            <?= form_open_multipart('rekapan/data_mahasiswa', 'id="ajukanSurat"') ?>
            <div class="row">
                <div class="col-lg-6">
                    <label class="text-center" for="tempat">Tempat Kerja Praktek</label>
                    <?= form_input(['type' => 'text', 'name' => 'tempat', 'id' => 'tempat', 'class' => 'form-control', "required" => "required"]); ?>
                </div>
                <div class="col-lg-6">
                    <label for="dospem">Dosen Pembimbing</label>
                    <?= form_input(['type' => 'text', 'name' => 'dospem', 'id' => 'dospem', 'class' => 'form-control', "required" => "required"]); ?>
                </div>

                <div class="col-lg-4 mt-3">
                    <p class="text-center"><b>MAHASISWA 1</b></p>
                    <label for="nama_1">Nama Mahasiswa</label>
                    <?= form_input(['name' => 'nama_1', 'id' => 'nama_1', 'class' => 'form-control', "required" => "required"]); ?>
                </div>
                <div class="col-lg-4 mt-3">
                    <p class="text-center"><b>MAHASISWA 2</b></p>
                    <label for="nama_2">Nama Mahasiswa</label>
                    <?= form_input(['name' => 'nama_2', 'id' => 'nama_2', 'class' => 'form-control']); ?>
                </div>
                <div class="col-lg-4 mt-3">
                    <p class="text-center"><b>MAHASISWA 3</b></p>
                    <label for="nama_3">Nama Mahasiswa</label>
                    <?= form_input(['name' => 'nama_3', 'id' => 'nama_3', 'class' => 'form-control']); ?>
                </div>

                <div class="col-lg-4 mt-2">
                    <label for="nrp_1">NRP Mahasiswa</label>
                    <?= form_input(['name' => 'nrp_1', 'id' => 'nrp_1', 'class' => 'form-control', "required" => "required"]); ?>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="nrp_2">NRP Mahasiswa</label>
                    <?= form_input(['name' => 'nrp_2', 'id' => 'nrp_2', 'class' => 'form-control']); ?>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="nrp_3">NRP Mahasiswa</label>
                    <?= form_input(['name' => 'nrp_3', 'id' => 'nrp_3', 'class' => 'form-control']); ?>
                </div>

                <div class="col-lg-4 mt-2">
                    <label for="rekening_1">No Rekening Mahasiswa</label>
                    <?= form_input(['name' => 'rekening_1', 'id' => 'rekening_1', 'class' => 'form-control', "required" => "required"]); ?>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="rekening_2">No Rekening Mahasiswa</label>
                    <?= form_input(['name' => 'rekening_2', 'id' => 'rekening_2', 'class' => 'form-control']); ?>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="rekening_3">No Rekening Mahasiswa</label>
                    <?= form_input(['name' => 'rekening_3', 'id' => 'rekening_3', 'class' => 'form-control']); ?>
                </div>

                
            </div>

            <div class="row mt-4">
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-block btn-primary">KIRIM DATA</button>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-block btn-secondary" href="javascript:window.history.go(-1);">KEMBALI</a>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</section>
