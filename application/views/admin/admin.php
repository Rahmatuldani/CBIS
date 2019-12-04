   <!-- Begin Page Content -->
   <div class="container-fluid">
   	<div class="jumbotron">
   		<h1>List Administrator</h1>
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
   					</tr>
   				<?php endforeach; ?>
   			</tbody>
   		</table>
   	</div>
   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
