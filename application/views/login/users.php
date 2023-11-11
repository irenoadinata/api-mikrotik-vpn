<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3> USERS
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-users">
					Tambah Users
				</button>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>

									<th>No</th>
									<th>Name</th>
									<th>Group</th>
									<th>Address</th>
									<th>Password</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($users as $data) {
									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['group']; ?></th>
										<th><?= $data['address']; ?></th>
										<th><?= $data['password']; ?></th>
										<th>
											<a href="<?= site_url('login/dellogin/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Users <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>

										</th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL TAMBAH PROFILE -->
	<div class="modal fade" id="modal-add-users" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Users </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('login/addlogin') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="group">Group</label>
							<select name="group" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="full">full</option>
								<option value="read">read</option>
							</select>
						</div>
						<div class="form-group">
							<label for="address">Allowed Address<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="address" class="form-control">
						</div>

						<div class="form-group">
							<label for="password">Password<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="password" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-outline-light">Save</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>