   <!-- Begin Page Content -->
   <div class="container-fluid">
   	<div class="jumbotron">
   		<h1>List Mata Kuliah</h1>
   		<table class="table table-striped">
   			<thead>
   				<td>No</td>
   				<td>Name Mata Kuliah</td>
   				<td>SKS</td>
   				<td>Kelas</td>
   				<td>Jadwal</td>
   			</thead>
   			<tbody>
   				<?php $no = 1 ?>
   				<?php foreach ($jadwal as $adm) : ?>
   					<tr>
   						<td><?= $no++ ?></td>
   						<td><?= $adm['name_matkul'] ?></td>
   						<td><?= $adm['sks'] ?></td>
   						<td><?= $adm['kelas'] ?></td>
   						<td><?= $adm['hari'], " : ", $adm['jam'], " : ", $adm['ruang'] ?></td>
						<td>
						<a class="btn btn-primary" href="<?= base_url('dosen/edit_matkul') ?>?id_edit=<?= $adm['id'] ?>"><i class="fas fa-edit mr-2"></i>Edit</a>
						<a class="btn btn-danger" href="<?= base_url('dosen/delete_matkul') ?>?id_delete=<?= $adm['id'] ?>"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
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
