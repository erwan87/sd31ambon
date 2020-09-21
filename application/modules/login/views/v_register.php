<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row justify-content-center">
	<div class="col-lg-7">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4"><?= $register; ?></h1>
							</div>
							<?= $this->session->flashdata('message'); ?>
							<!-- <form action="<?= base_url('login/regkom'); ?>" method="POST" enctype="multipart/form-data"> -->
							<?= form_open_multipart("login/regkom", array("id[]" => "form-user", "class" => "form-horizontal")) ?>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama ..." autofocus>
									<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username ...">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="email ...">
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="notelp" class="form-control form-control-user" id="notelp" name="notelp" placeholder="Notelp ...">
									<?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<select class="form-control" name="target" id="target">
										<option value="1">Pria</option>
										<option value="2">Wanita</option>
										<option></option>
									</select>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="repassword" name="repassword" placeholder="Repeat Password">
										<?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="control-label">Image</label>
									<div class="col-sm-12">
										<input type="file" class="form-control form-control-user"  name="image" required>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-user btn-block"> <i class="fa fa-save"></i> Save</button>
							<?= form_close(); ?>
							<br>
							<div class="text-center">
								<a href="<?= base_url(); ?>">Back to Dashboard</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>