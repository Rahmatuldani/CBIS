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
   					</tr>
   				<?php endforeach; ?>
   			</tbody>
   		</table>
   	</div>
   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
