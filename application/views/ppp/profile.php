<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3> <?= $title; ?>
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-profile">
					Tambah Profile
				</button>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<!-- <th><?= $totalprofile; ?></th> -->
									<th>No</th>
									<th>Name</th>
									<th>Local Address</th>
									<th>Remote Address</th>
									<th>Rate Limit</th>
									<th>Only One
									<th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($profile as $data) {
									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['local-address']; ?></th>
										<th><?= $data['remote-address']; ?></th>
										<th><?= $data['rate-limit']; ?></th>
										<th><?= $data['only-one']; ?></th>
										<th>
											<a href="<?= site_url('ppp/delProfile/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Profile <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>

											<!-- EDIT -->
											<a href="#" id="edit" data-name=<?= $data['name']; ?> data-id=<?= $data['.id']; ?> data-localaddress=<?= $data['local-address']; ?> data-remoteaddress=<?= $data['remote-address']; ?> data-ratelimit=<?= $data['rate-limit']; ?> data-onlyone=<?= $data['only-one']; ?> data-toggle="modal" data-target="#modal-edit" title="Edit">
												<i class="fa fa-edit" style="font-size:18px"></i>
											</a>
											<!-- END EDIT -->
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
	<div class="modal fade" id="modal-add-profile" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Profile </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('ppp/addpppprofile') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="localaddress">Local Address<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="localaddress" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="remoteaddress">Remote Address<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="remoteaddress" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="ratelimit">Rate Limit<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="ratelimit" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="onlyone">Only One</label>
							<select name="onlyone" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="no">no</option>
								<option value="yes">yes</option>
							</select>
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

	<div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Profile
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('ppp/editpppprofile') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="hidden" name="id" id="id">
							<input type="text" name="name" class="form-control" autocomplete="off" id="name" required>
						</div>
						<div class="form-group">
							<label for="localaddress">Local Address</label>
							<input type="text" name="localaddress" class="form-control" id="localaddress">
						</div>
						<div class="form-group">
							<label for="remoteaddress">Remote Address</label>
							<select name="remoteaddress" id="remoteaddress" class="form-control">
								<?php foreach ($pool as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="ratelimit">Rate Limit</label>
							<input type="text" name="ratelimit" class="form-control" id="ratelimit">
						</div>
						<div class="form-group">
							<label for="onlyone">Only One</label>
							<select name="onlyone" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="no">no</option>
								<option value="yes">yes</option>
								<option value="default">default</option>
							</select>
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

	<script>
		$(document).on('click', '#edit', function() {
			$('#id').val($(this).data('id'))
			$('#name').val($(this).data('name'))
			$('#localaddress').val($(this).data('localaddress'))
			$('#remoteaddress').val($(this).data('remoteaddress'))
			$('#ratelimit').val($(this).data('ratelimit'))
			$('#onlyone').val($(this).data('onlyone'))

		})
	</script>