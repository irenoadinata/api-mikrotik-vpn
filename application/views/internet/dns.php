<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>
				DNS
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-dns">
					Tambah DNS
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<!-- <th><?= $totaldns; ?></th> -->
									<th>No</th>
									<th>Server</th>
									<th>Allow Remote Request</th>

								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($dns as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['servers']; ?></th>
										<th>
											<a href="<?= site_url('internet/enabledns' . $id) ?>" onclick="return confirm('Anda Akan Mengaktifkan Allow Remote Request  ?')"><i class="fas fa-check-square" style="color:green"></i></a>
										</th>
										<!-- <th> -->
										<!-- <a href="<?= site_url('internet/delDns' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus DNS <?= $data['servers']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a> -->
										<!-- EDIT  -->
										<!-- <a href="#" id="edit" data-interface=<?= $data['interface']; ?> data-id=<?= $data['.id']; ?> data-toggle="modal" data-target="#modal-edit" title="Edit">
												<i class="fa fa-edit" style="font-size:18px"></i>
											</a> -->

										<!-- END EDIT  -->

										<!-- </th> -->
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL TAMBAH USER -->
	<div class="modal fade" id="modal-add-dns" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah DNS
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/adddns') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="servers">Server<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="servers" class="form-control" required>
						</div>
						<!-- <div class="form-group">
							<label for="usepeerdns">Use Peer DNS</label>
							<select name="usepeerdns" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="true">true</option>
								<option value="false">false</option>
							</select>
						</div>
						<div class="form-group">
							<label for="usepeerntp">Use Peer NTP</label>
							<select name="usepeerntp" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="true">true</option>
								<option value="false">false</option>
							</select>
						</div> -->

						<!-- <div class="form-group">
							<label for="localaddress">Local Address</label>
							<input type="text" name="localaddress" class="form-control">
						</div>
						<div class="form-group">
							<label for="remoteaddress">Remote Address</label>
							<input type="text" name="remoteaddress" class="form-control">
						</div> -->
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

	<!-- MODAL EDIT USER -->
	<!-- <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Add DHCP CLient
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/editdhcpclient') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="interface">Interface</label>
							<select name="interface" id="interface" class="form-control">
								<?php foreach ($interface as $data) { ?>
									<option>
										<?= $data['name']; ?>
									</option>
								<?php } ?>
							</select>
						</div> -->
	<!-- <div class="form-group">
							<label for="usepeerdns">Use Peer DNS</label>
							<select name="usepeerdns" id="usepeerdns" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="true">true</option>
								<option value="false">false</option>

							</select>
						</div> -->
	<!-- <div class="form-group">
							<label for="usepeerntp">Use Peer NTP</label>
							<select name="usepeerntp" id="usepeerntp" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="true">true</option>
								<option value="false">false</option>

							</select>
						</div> -->
	<!-- </div>
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
	<!-- 
	<script>
		$(document).on('click', '#edit', function() {
			$('#id').val($(this).data('id'))
			$('#interface').val($(this).data('interface'))

			// $('#localaddress').val($(this).data('localaddress'))
			// $('#remoteaddress').val($(this).data('remoteaddress'))

		})
	</script> -->