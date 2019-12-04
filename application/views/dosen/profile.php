<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">
			<center>Profile</center>
		</h1>
		<?= $this->session->flashdata('message') ?>
		<table class="table table-striped table-dark col-lg-8">
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><?= $user['nip'] ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><?= $user['name_dosen'] ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= $user['email'] ?></td>
			</tr>
			<tr>
				<td>Place and Date of Birth</td>
				<td>:</td>
				<td><?= $user['birth_place'], ", ", date("d-F-Y", strtotime($user['birth_date'])) ?></td>
			</tr>
			<tr>
				<td>Sex</td>
				<td>:</td>
				<td><?= $user['sex'] ?></td>
			</tr>
			<tr>
				<td>Region</td>
				<td>:</td>
				<td><?= $user['region'] ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?= $user['phone'] ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?= $user['address'] ?></td>
			</tr>
		</table>
		<a href="<?= base_url('dosen/edit_profile?pesan=belum') ?>" class="btn btn-success"><i class="fa fa-edit mr-2"></i>Edit</a>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
