<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Outer Row -->
<div class="row justify-content-center">
	<div class="col-lg-7">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					<h3>
						SISTEM INFORMASI AKADEMIK
					</h3>
					<h3>
						SD NEGERI 31 AMBON	
					</h3>
				</div>
			</div>
		</div>
		<div class="card o-hidden border-2 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4"><?= $login; ?></h1>
							</div>
							<div id="alert-message">
								<div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
							</div>
							<!-- <form class="user"> -->
							<form class="user" method="POST" enctype="multipart/form-data" action="<?= base_url('login/aksi') ?>">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="password" placeholder="Password">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<div class="text-right">
										<!-- <input type="submit" id="submit" name="submit" class="btn btn-success btn-user btn-block"> <i class="fa fa-login"></i> Log In -->
										<button type="submit" class="btn btn-success">Log In <i class="fa fa-sign-in"></i> </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>