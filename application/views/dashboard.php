<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">CPU Load</span>
							<span class="info-box-number">
								<?= $cpu; ?>
								<small>%</small>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('ppp/active') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">User Active</span>
								<span class="info-box-number"><?= $pppactive; ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</a>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('ppp/secret') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Secret</span>
								<span class="info-box-number"><?= $secret; ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</a>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Uptime</span>
							<span class="info-box-number"><?= $uptime; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>

			<!-- <select name="interface" id="interface">
				<?php foreach ($interface as $interface) { ?>
					<option value="<?= $interface['name'] ?>"><?= $interface['name'] ?></option>
				<?php } ?>
			</select> -->

			<div id="reloadtraffic"></div>

		</div>
	</div>
</div>

<!-- <script>
	setInterval("reloadtraffic();", 1000);

	function reloadtraffic() {
		var interface = $('#interface').val();
		console.log(interface);
		$('#reloadtraffic').load('<?= site_url('dashboard/traffic') ?>') + interface;
	}
</script> -->