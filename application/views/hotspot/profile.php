<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Hotspot <?= $title; ?>
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-profile">
					Add Profile
				</button>
				<!-- <?php var_dump($hotspotprofile) ?> -->
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th><?= $totalhotspotprofile; ?></th>
									<th>Name</th>
									<th>Shared User</th>
									<th>Rate Limit</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($hotspotprofile as $data) { ?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th>
											<a href="<?= site_url('hotspot/delProfile/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Profile <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['shared-users']; ?></th>
										<th><?= $data['rate-limit']; ?></th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-add-profile" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Add User Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('hotspot/addUserProfile') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="user">User</label>
							<input type="text" name="user" class="form-control" autocomplete="off" id="user" required>
						</div>
						<div class="form-group">
							<label for="rate_limit">Rate Limit<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="rate_limit" class="form-control" id="rate_limit" required>
						</div>
						<div class="form-group">
							<label for="shared_user">Shared User <i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="number" name="shared_user" class="form-control" id="shared_user" required>
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