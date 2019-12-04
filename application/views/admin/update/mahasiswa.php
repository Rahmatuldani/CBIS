<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<?= $this->session->flashdata('message') ?>
		<h1>Update Mahasiswa</h1>
		<table class="table table-striped">
			<thead>
				<td>No</td>
				<td>NIM</td>
				<td>Name</td>
				<td>Email</td>
				<td>Place and Date of Birth</td>
				<td>Sex</td>
				<td>Region</td>
				<td>Phone</td>
				<td>Address</td>
			</thead>
			<tbody>
				<?php foreach ($mahasiswa as $mhs) : ?>
					<tr>
						<td><?= ++$start ?></td>
						<td><?= $mhs['nim'] ?></td>
						<td><?= $mhs['name_mhs'] ?></td>
						<td><?= $mhs['email'] ?></td>
						<td><?= $mhs['birth_place'], ", ", date("d-F-Y", strtotime($mhs['birth_date'])) ?></td>
						<td><?= $mhs['sex'] ?></td>
						<td><?= $mhs['region'] ?></td>
						<td><?= $mhs['phone'] ?></td>
						<td><?= $mhs['address'] ?></td>
						<td>
							<a class="btn btn-primary" href="<?= base_url('update/edit_mahasiswa') ?>?id_edit=<?= $mhs['nim'] ?>"><i class="fas fa-edit mr-2"></i>Edit</a>
							<a class="btn btn-danger" href="<?= base_url('update/delete_mahasiswa') ?>?id_delete=<?= $mhs['nim'] ?>"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?= $this->pagination->create_links() ?>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
