<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">assignment_ind</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Mahasiswa</h4>
                        <div class="toolbar">

                            <!-- <a href="<?= base_url('penduduk/export') ?>" class="btn btn-info">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Export Exel
                            </a> -->

                            <!-- <a href="<?= base_url() ?>penduduk/tambah">
                                <button class="btn btn-info">
                                    <span class="btn-label">
                                        <i class="material-icons">add_circle_outline</i>
                                    </span>
                                    Tambah
                                </button>
                            </a> -->

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
                                        <th class="text-center">Keterangan</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr class="text-center">
                                            <td><?= $no; ?></td>
                                            <td><?= $key['nama']. ' - ' .$key['nik']; ?></td>
                                            <td><?= $key['nama_mhs_2']. ' - ' .$key['nrp_mhs_2']; ?></td>
                                            <td><?= $key['nama_mhs_3']. ' - ' .$key['nrp_mhs_3']; ?></td>
                                            <td><?= $key['no_hp']; ?></td>
                                            <td>
                                                <?php
                                                if ($key['status_mhs'] == '0')
                                                {
                                                    ?>
                                                    <div class="btn btn-simple btn-info" data-toggle="modal" data-target="#lihatStatus<?= $key['nik']; ?>">
                                                        Pending
                                                    </div>
                                                <?php
                                                } 
                                                else
                                                {
                                                   echo $key['status_mhs'] == 1 ? '<div class="btn btn-simple btn-success">Diterima</div>' : '<div class="btn btn-simple btn-danger">Ditolak</div>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- <a href="<?= base_url() ?>penduduk/edit/<?= $key['nik']; ?>" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">edit</i></a> -->

                                                <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusPenduduk<?= $key['nik']; ?>"><i class="material-icons">close</i></button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- modal ubah status -->
                        <?php foreach ($data as $key) : ?>
                            <div class="modal fade" id="lihatStatus<?= $key['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                        </div>

                                        <form method="post" action="<?= base_url(); ?>penduduk/approval/<?= $key['nik']; ?>">
                                            <div class="modal-body text-center">
                                                <h5>Ubah status mahasiswa KP</h5>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <label>
                                                    <input type="radio" name="status_mhs[<?= $no ?>]" value="1" required> Diterima
                                                </label> &nbsp; &nbsp;
                                                <label>
                                                    <input type="radio" name="status_mhs[<?= $no ?>]" value="2" required> Ditolak
                                                </label>
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
                        <!-- end modal ubah status -->

                        <!-- modal hapus pegawai -->
                        <?php foreach ($data as $key) : ?>
                            <div class="modal fade" id="hapusPenduduk<?= $key['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                        </div>

                                        <form method="post" action="<?= base_url(); ?>penduduk/hapus/<?= $key['nik']; ?>">
                                            <div class="modal-body text-center">
                                                <h5>Apakah anda yakin untuk menghapus Mahasiswa ini? </h5>
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
                        <!-- end modal hapus pegawai -->

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
