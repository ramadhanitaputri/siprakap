<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="card-content">
                        <?php if ($this->session->userdata('level') == 'koordinator') : ?>
                            <h4 class="card-title">Nomor Surat</h4>
                        <?php elseif ($this->session->userdata('level') == 'baak') : ?>
                            <h4 class="card-title">Nomor Surat</h4>
                        <?php endif; ?>
                        <div class="toolbar">

                            <?php if ($this->session->flashdata('success') == TRUE) : ?>
                                    <span><?= $this->session->flashdata('success'); ?></span>
                            <?php endif; ?>

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Pengaju</th>
                                        <!-- <th class="text-center">Tanggal</th -->
                                        <th class="text-center">Keterangan</th>
                                        <!-- <th class="text-center">File Surat</th> -->
                                        <th class="text-center">Nomor Surat Pengantar</th>
                                        <th class="text-center">Nomor Surat Terima Kasih</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr class="text-center">
                                            <td><?= $no; ?></td>
                                            <td><?= $key['nama_surat_keluar']; ?></td>
                                            <!-- <td><?= $key['tanggal_surat_keluar']; ?></td> -->
                                            <td>ID : <?= $key['keterangan_surat_keluar']; ?></td>
                                            <!-- <td>
                                                <button class="btn btn-simple btn-info" data-toggle="modal" data-target="#lihatSurat<?= $key['id_surat_keluar']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                            </td> -->
                                            <td><?= $key['nomor_surat']; ?></td>
                                            <td><?= $key['terima_kasih']; ?></td>
                                            <td class="text-center">

                                                <?php if ($this->session->userdata('level') == 'koordinator') : ?>
                                                    <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusSuratKeluar<?= $key['id_surat_keluar']; ?>"><i class="material-icons">delete</i></button>
                                                <?php elseif ($this->session->userdata('level') == 'baak') : ?>
                                                    <a href="<?= base_url() ?>surat/editSuratKeluar/<?= $key['id_surat_keluar']; ?>" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">edit</i></a>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- small modal hapus user -->

                        <?php foreach ($data as $key) : ?>
                            <div class="modal fade" id="hapusSuratKeluar<?= $key['id_surat_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                        </div>

                                        <form method="post" action="<?= base_url(); ?>surat/hapusSuratKeluar/<?= $key['id_surat_keluar']; ?>">
                                            <div class="modal-body text-center">
                                                <h5>Apakah anda yakin untuk menghapus surat masuk? </h5>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-simple" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-success btn-simple">Ya</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--    end small modal hapus user -->

                        <!-- notice modal -->

                        <?php foreach ($data as $key) : ?>
                            <div class="modal fade" id="lihatSurat<?= $key['id_surat_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notice">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                            <h5 class="modal-title text-center" id="myModalLabel">Surat Keluar</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="instruction">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/surat_keluar') ?>/<?= $key['file_surat_keluar'] ?>"></embed>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- end notice modal -->


                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>