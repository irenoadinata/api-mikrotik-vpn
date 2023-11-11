<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3> Pool
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-pool">
					Tambah Pool
				</button>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<!-- <th><?= $totalpool; ?></th> -->
									<th>No</th>
									<th>Name</th>
									<th>Adresses</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($pool as $data) {
									$no++; ?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['ranges']; ?></th>
										<th>
											<a href="<?= site_url('internet/delPool/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Profile <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>

											<!-- EDIT -->
											<a href="#" id="edit" data-name=<?= $data['name']; ?> data-id=<?= $data['.id']; ?> data-ranges=<?= $data['ranges']; ?> data-toggle="modal" data-target="#modal-edit" title="Edit">
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


	<!-- edit POOL -->

	<div class="modal fade" id="modal-add-pool" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-warning">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Pool </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/addinternetpool') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="adresses">Adresses<i class="fas fa-lightbulb-exclamation"></i></label>
							<input type="" name="adresses" class="form-control" required>
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
					<h4 class="modal-title">Add
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('internet/editinternetpool') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="hidden" name="id" id="id">
							<input type="name" name="name" class="form-control" autocomplete="off" id="name" required>
						</div>
						<div class="form-group">
							<label for="ranges">Adresses</label>
							<input type="" name="ranges" class="form-control" id="ranges">
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
			$('#ranges').val($(this).data('ranges'))

		})
	</script>