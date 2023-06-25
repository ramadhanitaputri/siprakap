<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data dan Nomor Rekening Mahasiswa Kerja Praktek</h4>
                        <div class="toolbar">

                            <a href="<?= base_url('rekapan/export') ?>" class="btn btn-info">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Export Exel
                            </a>

                            <?php if ($this->session->flashdata('success') == TRUE) : ?>
                                    <span><?= $this->session->flashdata('success'); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Mahasiswa 1</th>
                                        <th class="text-center">Mahasiswa 2</th>
                                        <th class="text-center">Mahasiswa 3</th>
                                        <th class="text-center">Tempat KP</th>
                                        <th class="text-center">Dospem</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr class="text-center">
                                            <td><?= $no; ?></td>
                                            <td><?= '['.$key['nama_1']. ' - ' .$key['nrp_1']. '] ' .$key['rekening_1']; ?></td>
                                            <td><?= '['.$key['nama_2']. ' - ' .$key['nrp_2']. '] ' .$key['rekening_2']; ?></td>
                                            <td><?= '['.$key['nama_3']. ' - ' .$key['nrp_3']. '] ' .$key['rekening_3']; ?></td>
                                            <td><?= $key['tempat']; ?></td>
                                            <td><?= $key['dospem']; ?></td>
                                            <td class="text-center">

                                                <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusData<?= $key['id_rekapan']; ?>"><i class="material-icons">close</i></button>

                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- modal hapus data -->
                        <?php foreach ($data as $key) : ?>
                            <div class="modal fade" id="hapusData<?= $key['id_rekapan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                        </div>

                                        <form method="post" action="<?= base_url(); ?>rekapan/hapus/<?= $key['id_rekapan']; ?>">
                                            <div class="modal-body text-center">
                                                <h5>Apakah anda yakin untuk menghapus Data Mahasiswa ini? </h5>
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
                        <!-- end modal hapus data -->

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
