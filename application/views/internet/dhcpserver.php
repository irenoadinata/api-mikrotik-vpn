<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>
				DHCP Server
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-dhcpserver">
					Tambah DHCP Server
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Interface</th>
									<th>Address Pool</th>
									<th>Enable</th>
									<th>Action</th>


								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($dhcpserver as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['interface']; ?></th>
										<th><?= $data['address-pool']; ?></th>
										<th>
											<a href="<?= site_url('internet/enabledhcpserver/' . $id) ?>" onclick="return confirm('Anda Akan Mengaktifkan Dhcp Server <?= $data['name']; ?> ?')"><i class="fas fa-check-square" style="color:green"></i></a>
										</th>
										<th>
											<a href="<?= site_url('internet/delDhcpserver/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Dhcp Server <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-network">
					Tambah Network
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Address</th>
									<th>Gateway</th>
									<th>DNS Server</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;
								foreach ($network as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['address']; ?></th>
										<th><?= $data['gateway']; ?></th>
										<th><?= $data['dns-server']; ?></th>
										<th>
											<a href="<?= site_url('internet/delNetwork/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Dhcp Server <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
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
	<div class="modal fade" id="modal-add-dhcpserver" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah DHCP Server
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/adddhcpserver') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required>
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
							<label for="pool">Address Pool</label>
							<select name="pool" class="form-control">
								<?php foreach ($pool as $data) { ?>
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
		</div>
	</div>
	<div class="modal fade" id="modal-add-network" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Network
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/addnetwork') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="address">Address<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="gateway">Gateway<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="gateway" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="dns-server">DNS Server<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="text" name="dns-server" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-outline-light">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>