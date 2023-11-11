<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Hotspot <?= $title; ?>
			</h3>
			<div class="card-body">
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th><?= $totalhotspotcookies; ?></th>
									<th>Users</th>
									<th>MAC Address</th>
									<th>Expires In</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($hotspotcookies as $data) { ?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th>
											<a href="<?= site_url('hotspot/delcookies/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus cookies <?= $data['user']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
										<th><?= $data['user']; ?></th>
										<th><?= $data['mac-address']; ?></th>
										<th><?= $data['expires-in']; ?></th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>