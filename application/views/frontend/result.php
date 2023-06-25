<section class="page-section">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Tracking Surat Kerja Praktek</h2>
			<h3 class="section-subheading text-muted">Surat <b>Ditemukan</b>, Detail Dibawah:</h3>
		</div>
		<div class="text-justify pl-5 pr-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-lg-7">
							<h3>Keterangan:</h3>
							<table class="table text-left">
								<tr>
									<td>ID Pengajuan</td>
									<td>:</td>
									<td><?= $row['id'] ?></td>
								</tr>
								<tr>
									<td>Mahassiwa 1</td>
									<td>:</td>
									<td><?= $row['nama']. ' - ' . $row['NIK']?></td>
								</tr>
								<tr>
									<td>Mahassiwa 2</td>
									<td>:</td>
									<td><?= $row['nama_mhs_2']. ' - ' . $row['nrp_mhs_2']?></td>
								</tr>
								<tr>
									<td>Mahassiwa 3</td>
									<td>:</td>
									<td><?= $row['nama_mhs_3']. ' - ' . $row['nrp_mhs_3']?></td>
								</tr>
								<tr>
									<td>Tempat Kerja Praktek</td>
									<td>:</td>
									<td><?= $row['no_hp'] ?></td>
								</tr>
								<tr>
									<td>Program Studi</td>
									<td>:</td>
									<td><?= $options[$row['jenis_surat']] ?></td>
								</tr>
								<tr>
									<td>File Surat</td>
									<td>:</td>
									<td>
										<button class="btn btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row['id']; ?>"><i class="fa fa-eye"></i></button>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<div class="checkout-wrap">
							<ul class="checkout-bar">
								<?php if ($row['status'] == '1') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Pengajuan Surat<br>Diterima</li>
									<li class="">Verifikasi Berkas <br>Surat</li>
									<li class="">Pemberian<br>Nomor Surat</li>
									<li class="">Sudah Ditandatangani<br>Kaprodi</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '2') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Pengajuan Surat<br>Ditolak</li>
									<h1>MAAF PENGAJUAN ANDA DITOLAK KARENA ANDA SUDAH MELAKUKAN PENGAJUAN SEBELUMNYA</h1>

								<?php elseif ($row['status'] == '3') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Pengajuan Surat<br>Diterima</li>
									<li class="active">Verifikasi Berkas <br>Surat</li>
									<li class="">Pemberian<br>Nomor Surat</li>
									<li class="">Sudah Ditandatangani<br>Kaprodi</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '4') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Pengajuan Surat<br>Diterima</li>
									<li class="active">Verifikasi Berkas <br>Surat</li>
									<li class="active">Pemberian<br>Nomor Surat</li>
									<li class="">Sudah Ditandatangani<br>Kaprodi</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '5') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Pengajuan Surat<br>Diterima</li>
									<li class="active">Verifikasi Berkas <br>Surat</li>
									<li class="active">Pemberian<br>Nomor Surat</li>
									<li class="active">Sudah Ditandatangani<br>Kaprodi</li>
									<li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> <br>
	</div>
</section>


<?php if ($row['status'] == '5') : ?>
<section class="page-section">
	<div class="container">
		<div class="text-justify pl-5 pr-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-lg-7">
							<h3>Surat Kerja Praktek:</h3> <br>
							<table class="table text-left">
								<tr>
									<td>Surat Pengantar</td>
									<td>:</td>
									<td>
										<a class="btn btn-outline-info" data-toggle="modal" data-target="#suratpengantar"><i class="fa fa-pen"></i></a> &nbsp;
										<a class="btn btn-outline-info" href="<?= base_url('suratpengantar')?>"><i class="fa fa-paper-plane"></i></a>
									</td>
								</tr>
								<tr>
									<td>Surat Balasan</td>
									<td>:</td>
									<td>
										<a class="btn btn-outline-info" href="<?= base_url('suratbalasan') ?>"><i class="fa fa-paper-plane"></i></a>
									</td>
								</tr>
								<tr>
									<td>Surat Terima Kasih</td>
									<td>:</td>
									<td>
										<a class="btn btn-outline-info" data-toggle="modal" data-target="#suratmakasih"><i class="fa fa-pen"></i></a> &nbsp;
										<a class="btn btn-outline-info" href="<?= base_url('suratterimakasih')?>"><i class="fa fa-paper-plane"></i></a>
									</td>
								</tr>
							</table> <br>
							<h3>Data Mahasiswa:</h3> <br>
							<table class="table text-left">
								<tr>
									<td>
										<a class="btn btn-outline-info" data-toggle="modal" data-target="#datadiri"><i class="fa fa-user"></i> &nbsp; Lengkapi Data</a>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</section>
<?php endif; ?>

<br><br>

<!-- Modal -->
<div class="modal fade" id="lihatFile<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileLampiran">File ID: <?= $row['id'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<embed width="100%" height="450px;" src="<?= base_url('uploads/berkas') ?>/<?= $row['file'] ?>"></embed>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Surat Pengantar -->
<div class="modal fade" id="suratpengantar" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Pengantar Kerja Praktek</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<p><h4>Selamat!</h4> Pengajuanmu diterima! Berikut <b>nomor surat</b> Anda: <b><?= $nos['nomor_surat'] ?></b></p>

					<p>Silahkan cetak <b>Surat Pengantar KP</b> sesuai prodi Anda!</p>
                    <a class="btn btn-primary btn-md" href="<?= base_url('suratinformatika')?>/index/<?php echo $id; ?>">TEKNIK INFORMATIKA</a>
                    <a class="btn btn-primary btn-md" href="<?= base_url('suratmultimedia')?>/index/<?php echo $id; ?>">MULTIMEDIA BROADCASTING</a>
                </div>            

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Surat Terima Kasih -->
<div class="modal fade" id="suratmakasih" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Terima Kasih Kerja Praktek</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<p><h4>Selamat!</h4> Anda telah menyelesaikan Kerja Praktek! <br>Berikut <b>nomor surat</b> Anda: <b><?= $nos['terima_kasih'] ?></b></p>

					<p>Silahkan cetak <b>Surat Terima Kasih KP</b> sesuai prodi Anda!</p>
                    <a class="btn btn-primary btn-md" href="<?= base_url('terimainformatika')?>/index/<?php echo $id; ?>">TEKNIK INFORMATIKA</a>
                    <a class="btn btn-primary btn-md" href="<?= base_url('terimamultimedia')?>/index/<?php echo $id; ?>">MULTIMEDIA BROADCASTING</a>
                </div>            

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Lengkapi Data Diri -->
<div class="modal fade" id="datadiri" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<p><h4>Reminder!</h4></p>
					<p>Lengkapi data diri ketika sudah <b>diterima</b> oleh tempat kerja praktek Anda, <br> isi data sesuai dengan jumlah mahasiswa dalam satu kelompok!</p>
                    <a class="btn btn-primary btn-md" href="<?= base_url('rekapan/data_mahasiswa')?>">Lanjutkan</a>
                </div>            

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>