<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<?= $this->session->flashdata('message') ?>
		<h1>Update Mata Kuliah</h1>
		<a class="btn btn-success m-2" href="<?= base_url('update/add_matkul') ?>"><i class="fas fa-plus mr-2"></i>Add</a>
		<table class="table table-striped">
			<thead>
				<td>No</td>
				<td>Matkul Code</td>
				<td>Name</td>
				<td>Semester</td>
				<td>SKS</td>
			</thead>
			<tbody>
				<?php foreach ($matkul as $mhs) : ?>
					<tr>
						<td><?= ++$start ?></td>
						<td><?= $mhs['id_matkul'] ?></td>
						<td><?= $mhs['name_matkul'] ?></td>
						<td><?= $mhs['semester'] ?></td>
						<td><?= $mhs['sks'] ?></td>
						<td>
							<a class="btn btn-primary" href="<?= base_url('update/edit_matkul') ?>?id_edit=<?= $mhs['id_matkul'] ?>"><i class="fas fa-edit mr-2"></i>Edit</a>
							<a class="btn btn-danger" href="<?= base_url('update/delete_matkul') ?>?id_delete=<?= $mhs['id_matkul'] ?>"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
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
