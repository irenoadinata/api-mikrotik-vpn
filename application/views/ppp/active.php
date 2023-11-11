<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>User Active</h3>

			<!-- <?php var_dump($pppactive) ?> -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3>Total User Active : <?= $totalpppactive; ?></h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
									<thead>
										<tr>
											<!-- <th><?= $totalpppactive; ?></th> -->
											<th>No</th>
											<th>Name</th>
											<th>Service</th>
											<th>Caller ID</th>
											<th>Address</th>
											<th>Uptime</th>
											<th>Session ID</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php $no = 0;
										foreach ($pppactive as $data) {
											$no++;
										?>
											<tr>
												<?php $id = str_replace('*', '', $data['.id']) ?>
												<th><?= $no ?> </th>
												<th><?= $data['name']; ?></th>
												<th><?= $data['service']; ?></th>
												<th><?= $data['caller-id']; ?></th>
												<th><?= $data['address']; ?></th>
												<th><?= $data['uptime']; ?></th>
												<th><?= $data['session-id']; ?></th>
												<th>
													<a href="<?= site_url('ppp/delPppActive/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus User <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
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
		</div>
	</div>
</div>