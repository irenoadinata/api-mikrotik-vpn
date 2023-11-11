<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Hotspot <?= $title; ?></h3>

			<!-- <?php var_dump($hotspotactive) ?> -->
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th><?= $totalhotspotactive; ?></th>
									<th>User</th>
									<th>Server</th>
									<th>Login By</th>
									<th>Uptime</th>
									<th>Bytes In</th>
									<th>Bytes Out</th>
									<th>Comment</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($hotspotactive as $data) { ?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th>
											<a href="<?= site_url('hotspot/delUserActive/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus User <?= $data['user']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
										<th><?= $data['user']; ?></th>
										<th><?= $data['server']; ?></th>
										<th><?= $data['login-by']; ?></th>
										<th><?= $data['uptime']; ?></th>
										<th style="text-align: right;"><?= formatBytes($data['bytes-in'], 2); ?></th>
										<th style="text-align: right;"><?= formatBytes($data['bytes-out'], 3); ?></th>
										<th><?= $data['comment']; ?></th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>