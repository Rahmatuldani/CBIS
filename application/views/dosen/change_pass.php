<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Change Password</h1>
		<?= $this->session->flashdata('message') ?>
		<form action="<?= base_url('dosen/change_password?id=') . $user['nip'] ?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="password" class="form-control" name="new_pass1" placeholder="Insert new password">
					<?= form_error('new_pass1', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="new_pass2" placeholder="Rewrite new password">
					<?= form_error('new_pass2', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
				<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
				<a href="<?= base_url('dosen/profile') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
			</div>
	</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
