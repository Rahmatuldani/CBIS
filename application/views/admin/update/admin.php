<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<?= $this->session->flashdata('message') ?>
		<h1>Update Administrator</h1>
		<table class="table table-striped">
			<thead>
				<td>No</td>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Place and Date of Birth</td>
				<td>Sex</td>
				<td>Region</td>
				<td>Phone</td>
				<td>Address</td>
			</thead>
			<tbody>
				<?php foreach ($admin as $adm) : ?>
					<tr>
						<?php $no = 1 ?>
						<td><?= $no++ ?></td>
						<td><?= $adm['id_admin'] ?></td>
						<td><?= $adm['name_admin'] ?></td>
						<td><?= $adm['email'] ?></td>
						<td><?= $adm['birth_place'], ", ", date("d-F-Y", strtotime($adm['birth_date'])) ?></td>
						<td><?= $adm['sex'] ?></td>
						<td><?= $adm['region'] ?></td>
						<td><?= $adm['phone'] ?></td>
						<td><?= $adm['address'] ?></td>
						<td>
							<a class="btn btn-primary" href="<?= base_url('update/edit_admin') ?>?id_edit=<?= $adm['id_admin'] ?>"><i class="fas fa-edit mr-2"></i>Edit</a>
							<a class="btn btn-danger" href="<?= base_url('update/delete_admin') ?>?id_delete=<?= $adm['id_admin'] ?>"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
