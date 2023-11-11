<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3> PPPOE Servers
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-pppoe">
					Tambah PPPOE Server
				</button>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<!-- <th><?= $totalservice; ?></th> -->
									<th>No</th>
									<th>Service Name</th>
									<th>Interface</th>
									<th>Default Profile</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($service as $data) {
									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['service-name']; ?></th>
										<th><?= $data['interface']; ?></th>
										<th><?= $data['default-profile']; ?></th>
										<th>
											<a href="<?= site_url('ppp/delPppoeserver/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Profile <?= $data['service-name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
											<a href="<?= site_url('ppp/enablepppoeserver/' . $id) ?>" onclick="return confirm('Anda Akan Mengaktifkan PPPOE Server <?= $data['service-name']; ?> ?')"><i class="fas fa-check-square" style="color:green"></i></a>
											<!-- EDIT -->
											<!-- <a href="#" id="edit" data-servicename=<?= $data['service-name']; ?> data-id=<?= $data['.id']; ?> data-interface=<?= $data['interface']; ?> data-defaultprofile=<?= $data['default-profile']; ?> data-toggle="modal" data-target="#modal-edit" title="Edit">
												<i class="fa fa-edit" style="font-size:18px"></i>
											</a> -->
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


	<div class="modal fade" id="modal-add-pppoe" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah PPPOE Server</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('ppp/addPppoeServers') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="servicename">Service Name</label>
							<input type="text" name="servicename" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="interface">Interface</label>
							<select name="interface" class="form-control">
								<?php foreach ($interface as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="defaultprofile">Default Profile</label>
							<select name="defaultprofile" class="form-control">
								<?php foreach ($defaultprofile as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
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

	<!-- <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Edit PPPOE Servers</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('ppp/editPppoeServers') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="servicename">Service Name</label>
							<input type="hidden" name="id" id="id">
							<input type="text" name="servicename" class="form-control" autocomplete="off" id="servicename" required>
						</div>
						<div class="form-group">
							<label for="interface">Interface</label>
							<select name="interface" id="interface" class="form-control">
								<?php foreach ($interface as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="default-profile">Default Profile</label>
							<select name="default-profile" id="default-profile" class="form-control">
								<?php foreach ($defaultprofile as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-outline-light">Save</button>
					</div>
				</form>
			</div> -->
	<!-- /.modal-content -->
	<!-- </div> -->
	<!-- /.modal-dialog -->
	<!-- </div> -->
	<!-- <script>
		$(document).on('click', '#edit', function() {
			$('#id').val($(this).data('id'))
			$('#servicename').val($(this).data('servicename'))
			$('#interface').val($(this).data('interface'))
			$('#defaultprofile').val($(this).data('default-profile'))

		})
	</script> -->