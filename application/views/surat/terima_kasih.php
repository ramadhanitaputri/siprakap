<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="orange">
						<i class="material-icons">mail</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Surat Terima Kasih</h4>
						<div class="toolbar">
							<!-- <a href="<?= base_url() ?>surat/tambah_terima_kasih">
								<button class="btn btn-info">
									<span class="btn-label">
										<i class="material-icons">check</i>
									</span>
									Tambah
								</button>
							</a> -->

							<?php if ($this->session->flashdata('success') == TRUE) : ?>
							<div class="alert alert-success">
								<span><?= $this->session->flashdata('success'); ?></span>
							</div>
							<?php endif; ?>

						</div>
						<div class="material-datatables">
							<table id="datatables" class="table table-striped table-no-bordered table-hover"
								cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">ID Pengajuan</th>
										<th class="text-center">Tempat KP</th>
										<th class="text-center">Program Studi</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">File</th>
										<!-- <th class="disabled-sorting text-center">Actions</th> -->
									</tr>
								</thead>
								<tbody>

									<?php $no = 1; ?>
									<?php foreach ($data as $key) : ?>
									<tr class="text-center">
										<td><?= $no; ?></td>
										<td><?= $key['nama_terima_kasih']; ?></td>
										<td><?= $key['tempat_terima_kasih']; ?></td>
										<td><?= $key['prodi_terima_kasih']; ?></td>
										<td><?= $key['tanggal_terima_kasih']; ?></td>
										<td>
											<button class="btn btn-simple btn-info" data-toggle="modal"
												data-target="#lihatSurat<?= $key['id_terima_kasih']; ?>"><i
													class="material-icons">remove_red_eye</i>
											</button>
										</td>
										<!-- <td class="text-center">
											<a href="<?= base_url() ?>surat/editSuratMasuk/<?= $key['id_terima_kasih']; ?>"class="btn btn-simple btn-primary btn-icon"><i class="material-icons">edit</i></a>
													
											<button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusTerimaKasih<?= $key['id_terima_kasih'];?>"><i class="material-icons">close</i></button>
										</td> -->
									</tr>
									<?php $no++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>


						<!-- small modal hapus user -->

						<?php foreach ($data as $key) : ?>
						<div class="modal fade" id="hapusTerimaKasih<?= $key['id_terima_kasih']; ?>" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-small ">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
												class="material-icons">clear</i></button>
									</div>

									<form method="post"
										action="<?= base_url(); ?>surat/hapusTerimaKasih/<?= $key['id_terima_kasih']; ?>">
										<div class="modal-body text-center">
											<h5>Apakah anda yakin untuk menghapus surat balasan ini? </h5>
										</div>
										<div class="modal-footer text-center">
											<button type="button" class="btn btn-simple"
												data-dismiss="modal">Tidak</button>
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
						<div class="modal fade" id="lihatSurat<?= $key['id_terima_kasih']; ?>" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-notice">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
												class="material-icons">clear</i></button>
										<h5 class="modal-title text-center" id="myModalLabel">Surat Balasan</h5>
									</div>
									<div class="modal-body">
										<div class="instruction">
											<div class="row">
												<div class="col-md-12">
													<embed type="application/pdf" width="100%" height="450px;"
														src="<?= base_url('uploads/terima_kasih') ?>/<?= $key['file_terima_kasih'] ?>"></embed>
												</div>

											</div>
										</div>

									</div>
									<div class="modal-footer text-center">
										<button type="button" class="btn btn-info btn-round"
											data-dismiss="modal">Tutup</button>
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
