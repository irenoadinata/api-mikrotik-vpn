<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3> IP Address
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-ipaddress">
					Tambah IP Address
				</button>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<!-- <th><?= $totalipaddress; ?></th> -->
									<th>No</th>
									<th>Address</th>
									<th>Interface</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($ipaddress as $data) {
									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['address']; ?></th>
										<!-- <th><?= $data['network']; ?></th> -->
										<th><?= $data['interface']; ?></th>
										<th>
											<a href="<?= site_url('internet/delIpaddress/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus IP Address <?= $data['address']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>

											<!-- EDIT -->
											<!-- <a href="#" id="edit" data-address=<?= $data['address']; ?> data-id=<?= $data['.id']; ?> data-network=<?= $data['network']; ?> data-interface=<?= $data['interface']; ?> data-toggle="modal" data-target="#modal-edit" title="Edit">
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

	<!-- MODAL TAMBAH PROFILE -->
	<div class="modal fade" id="modal-add-ipaddress" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah IP Address </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/addipaddress') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="address">IP Address<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="address" class="form-control" required>
						</div>
						<!-- <div class="form-group">
							<label for="network">Network<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="network" class="form-control" required>
						</div> -->
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
					<h4 class="modal-title">Add <?= $title; ?>
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/editipaddress') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="address">IP Address</label>
							<input type="text" name="address" class="form-control" id="address">
						</div>
						<!-- <div class="form-group">
							<label for="network">Network</label>
							<input type="text" name="network" class="form-control" id="network">
						</div> -->
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
			$('#address').val($(this).data('address'))
			// $('#network').val($(this).data('network'))
			$('#interface').val($(this).data('interface'))

		})
	</script>