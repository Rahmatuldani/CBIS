<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Edit Profile</h1>
		<form action="<?= base_url('admin/edit_profile') ?>?pesan=save" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="id" onkeypress="return angka(event)" value="<?= $user['id_admin'] ?>" disabled>
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" value="<?= $user['name_admin'] ?>">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<label for="">Birth Place and Date</label>
					<div class="form-inline justify-content-between">
						<input type="text" class="form-control col-5" name="place" value="<?= $user['birth_place'] ?>">
						<input type="date" class="form-control col-5" name="date" value="<?= $user['birth_date'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="">Sex</label>
					<select class="form-control" name="sex" id="">
						<option value="<?= $user['sex'] ?>" selected><?php if ($user['region'] == "") {
																			echo "-- Choose Sex --";
																		} else {
																			echo $user['sex'];
																		} ?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Region</label>
					<select class="form-control" name="region" id="">
						<option value="<?= $user['region'] ?>" selected><?php if ($user['region'] == "") {
																			echo "-- Choose Region --";
																		} else {
																			echo $user['region'];
																		} ?></option>
						<option value="Islam">Islam</option>
						<option value="Christian">Christian</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Address</label>
					<input type="text" class="form-control" name="address" value="<?= $user['address'] ?>">
				</div>
				<div class="form-group">
					<label for="">Phone Number</label>
					<input type="text" class="form-control" name="phone" onkeypress="return angka(event)" value="<?= $user['phone'] ?>">
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
				<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
				<a href="<?= base_url('admin/profile') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
			</div>
	</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
