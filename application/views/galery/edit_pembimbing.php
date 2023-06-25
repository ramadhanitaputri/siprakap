<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('success') == TRUE) : ?>
				<div class="alert alert-success">
					<span><?= $this->session->flashdata('success'); ?></span>
				</div>
				<?php endif; ?>
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="orange">
						<i class="material-icons">folder</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Edit Monitoring KP - Pembimbing</h4>
						<image class="img-fluid" src="<?= base_url('/assets/galery/');  echo $profil[0]['pembimbing'] ?>" alt="struktur-pembimbing"></image>
						<hr />
						<form  enctype="multipart/form-data" action="<?= base_url('galery/edit_pembimbing/')?><?= $profil[0]['id']?>" method="post">
                        
							<label for="pembimbing">Ganti Monitoring KP - Pembimbing</label>
							<input type="file" accept="image/*" name="pembimbing" id="pembimbing">
							<input type="hidden" name="pembimbing_old" value="<?= $profil[0]['pembimbing'] ?>" id="pembimbing">
							<button class="btn btn-primary pull-right" type="submit">Update</button>
						</form>
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
