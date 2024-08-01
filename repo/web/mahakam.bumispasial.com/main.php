<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>Halaman Peta</title>

	<script src="vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link href="assets/css/styles.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

	<!-- Custom styles for this template -->
	<link href="assets/css/simple-sidebar.css" rel="stylesheet">

	<!-- PETA -->
	<link rel="stylesheet" href="assets/leaflet.css">
	<script src="assets/leaflet-src.js"></script>
	<link rel="stylesheet" href="assets/screen.css">

	<script src="assets/js/leaflet.ajax.js"></script>
	<!--memunculkan clustering titik-->
	<link rel="stylesheet" href="assets/leaflet-marker-cluster/MarkerCluster.css">
	<link rel="stylesheet" href="assets/leaflet-marker-cluster/MarkerCluster_002.css">
	<!-- munculkan mouse koordinat-->
	<link rel="stylesheet" href="assets/leaflet-mouseposition/L.Control.MousePosition.css">
	<!-- munculkan navigasi pengukuran-->
	<link rel="stylesheet" href="assets/leaflet-measure/leaflet-measure.css">
	<!-- Geolocation CSS Library -->
	<link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
	<!-- Font Awesome CSS Library -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--Popup Sidebar-->
	<link rel="stylesheet" href="assets/leaflet-sidebar/L.Control.Sidebar.css" />
	<script src="assets/leaflet-sidebar/L.Control.Sidebar.js"></script>
	<!--ZoomHome-->
	<link rel="stylesheet" href="assets/leaflet-zoomhome/leaflet.zoomhome.css" />
	<!-- Include the loading control -->
	<link rel="stylesheet" href="assets/leaflet-control-loading/Control.Loading.css" />
	<script src="assets/leaflet-control-loading/Control.Loading.js"></script>

	<script src="assets/leaflet.js"> </script>
	<script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
	<script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>
	<script src="assets/js/labels.js"></script>
	<!-- PETA -->

	<style>
		body {
			padding: 0;
			margin: 0;
		}

		#map {
			width: auto;
			height: 100%;
		}

		.info {
			padding: 6px 8px;
			font: 14px/16px;
			background: white;
			background: rgba(255, 255, 255, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
		}

		.leaflet-popup-content {
			width: 300px;
			max-height: 300px;
			overflow-y: scroll;
		}

		.styleLabel {
			background: rgba(255, 255, 255, 0);
			border-radius: 0px;
			font-size: 10pt;
			color: white;
			background-color: transparent;
			border: transparent;
			box-shadow: none;
		}

		table,
		th,
		td {
			margin: 0px 5px;
			padding: 2px 4px;
		}

		h6 {
			display: block;
			padding: 0.5rem 1rem;
			color: rgba(0, 0, 0, 0.75);
			text-decoration: none;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}


		/* ============ desktop view ============ */
		@media all and (min-width: 992px) {

			.dropdown-menu li {
				position: relative;
			}

			.dropdown-menu .submenu {
				display: none;
				position: absolute;
				left: 100%;
				top: -7px;
			}

			.dropdown-menu .submenu-left {
				right: 100%;
				left: auto;
			}

			.dropdown-menu>li:hover {
				background-color: #f1f1f1
			}

			.dropdown-menu>li:hover>.submenu {
				display: block;
			}

		}

		/* ============ desktop view .end// ============ */

		/* ============ small devices ============ */
		@media (max-width: 991px) {

			.dropdown-menu .dropdown-menu {
				margin-left: 0.7rem;
				margin-right: 0.7rem;
				margin-bottom: .5rem;
			}

		}

		/* ============ small devices .end// ============ */
	</style>

</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!--ZoomHome-->
		<script src="assets/leaflet-zoomhome/leaflet.zoomhome.min.js"></script>
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="index.html"><img src="assets/images/logo.png" alt="logo" width="auto" height="45"></img></a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Jenis RHL</a>

				<?php
				require_once("bin/model/rhl_model.php");

				$rhl_m = new RhlModel();
				$all_rhl = $rhl_m->get_all_rhl();
				?>

				<ul class="dropdown-menu">
					<?php
					foreach ($all_rhl as $r) {
					?>
						<li><a class="dropdown-item" href="http://localhost/coba/intensif_2020.php?jenis_rhl=<?= $r['id'] ?>"><?= $r['tahun'] . ' - ' . $r['jenis_rhl'] ?></a>
						</li>
					<?php
					}
					?>
				</ul>
			</li>
		</ul>

		<ul class="navbar-nav  ms-auto me-0 me-md-3 my-2 my-md-0">
			<li class="nav-item">
				<a class="nav-link" href="index.html">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="intensif_2020.html">Peta <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Tentang</a>
			</li>
		</ul>

	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
				<div class="sb-sidenav-footer">
					<?php $thisrhl = $rhl_m->get_rhl_by_id($_GET['jenis_rhl']); ?>
					<div class="small">Tahun <?= $thisrhl['tahun']; ?></div>
					<?= $thisrhl['jenis_rhl']; ?>
				</div>

				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">KPH/Pemangku</div>
						<?php
						if (!isset($_GET['jenis_rhl'])) {
							echo "<small>Silakan pilih RHL terlebih dahulu</small>";
						} else {
							$id_rhl = $_GET['jenis_rhl'];
							$all_kph = $rhl_m->get_all_kph_blok($id_rhl);
							// var_dump($all_kph);
							foreach ($all_kph as $k) {
						?>
								<a class="nav-link collapsed kph_btn" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?= $k['id'] ?>" data-kphid="<?= $k['id'] ?>" aria-expanded="false" aria-controls="collapse1">
									<div class="sb-nav-link-icon"></i></div>
									<?= $k['kph'] ?>
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<?php
								if ($k['list_blok'] !== '') {
									$all = explode(':', $k['list_blok']);
								?>
									<div class="collapse" id="collapse<?= $k['id'] ?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
										<nav class="sb-sidenav-menu-nested nav">
											<?php
											foreach ($all as $a) {
												$each = explode(',', $a);
												// index 0 ==> ID Blok
												// index 1 ==> No Blok
											?>
												<a class="zoom-center kph-blok-btn" href="#" data-blokid="<?= $each[0] ?>">
													<h6><?= 'Blok ' . $each[1] ?></h6>
												</a>
											<?php
											} ?>
										</nav>
									</div>
								<?php
								}
								?>
						<?php
							}
						}
						?>
					</div>
				</div>


			</nav>
		</div>

		<div id="layoutSidenav_content">
			<!-- BAGIAN PETA -->
			<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
			<script src="assets/leaflet-measure/leaflet-measure.js"></script>
			<script src="assets/leaflet-mouseposition/L.Control.MousePosition.js"></script>

			<!-- sidebar popup -->
			<div id="sidebarpopup">
				<!-- <h5>INFORMASI</h5>
				<table>
					<tr>
						<th>Wilayah Kerja</th>
						<td id='pop1'></td>
					</tr>
					<tr>
						<th>Nomor Petak</th>
						<td id='pop2'></td>
					</tr>
					<tr>
						<th>Nomor Blok </th>
						<td id='pop3'></td>
					</tr>
					<tr>
						<th>Nama Blok</th>
						<td id='pop4'></td>
					</tr>
					<tr>
						<th>KPH</th>
						<td id='pop5'></td>
					</tr>
					<tr>
						<th>Fungsi kawasan</th>
						<td id='pop6'></td>
					</tr>
					<tr>
						<th>Luas Petak</th>
						<td id='pop7'></td>
					</tr>
					<tr>
						<th>Desa</th>
						<td id='pop8'></td>
					</tr>
					<tr>
						<th>Kecamatan</th>
						<td id='pop9'></td>
					</tr>
					<tr>
						<th>Kabupaten</th>
						<td id='pop10'></td>
					</tr>
					<tr>
						<th>Provinsi</th>
						<td id='pop11'></td>
					</tr>
				</table>
				<br> -->

				<div class="container1 mb-3">
					<small class="text-muted">KPH <i class="fas fa-xs fa-chevron-right mr-1 ml-1"></i> Nama/Nomor Blok <i class="fas fa-xs fa-chevron-right mr-1 ml-1"></i> Nomor Petak <i class="fas fa-xs fa-chevron-right mr-1 ml-1"></i> Titik <i class="fas fa-xs fa-chevron-right mr-1 ml-1"></i>ID</small>
					<div class="mt-1">
						<h4 class="d-inline mr-2" id="kph_here">-</h4>
						<!-- <i class="fe fe-chevron-right fe-14"></i> -->
						<i class="fas fa-chevron-right"></i>
						<h4 class="d-inline mr-2 ml-2" id="blok_here">-</h4>
						<i class="fas fa-chevron-right"></i>
						<h4 class="d-inline mr-2 ml-2" id="petak_here">-</h4>
						<i class="fas fa-chevron-right"></i>
						<h4 class="d-inline mr-2 ml-2" id="titik_here">-</h4>
						<i class="fas fa-chevron-right"></i>
						<h4 class="d-inline ml-2" id="fid_here">-</h4>
					</div>
				</div>
				<div class="container2 mb-2">
					<i class="fas fa-compass mr-2"></i>
					<p class="d-inline mr-2"><span id="koord_x">98.577223980972</span> ,</p>
					<p class="d-inline"><span id="koord_y">3.28682711017545</span></p>
				</div>
				<div class="container3 mb-3">
					<i class="fas fa-map-pin mr-2"></i>
					<p class="mr-2 d-inline">Desa <span id="desa_here">null</span> ,</p>
					<p class="mr-2 d-inline">Kec. <span id="kec_here">Sibolangit</span> ,</p>
					<p class="mr-2 d-inline">Kab. <span id="kab_here">Deli Serdang</span> ,</p>
					<p class="mr-2 d-inline">Prov. <span id="prov_here">Sumatera Utara</span></p>
				</div>
				<div class="container4 mb-2">
					<div class="row border-bottom">
						<div class="col-3 text-center mb-3">
							<p class="text-muted mb-1">Jumlah Petak</p>
							<h5 class="mb-1" id="jml_petak">$6,830</h5>
						</div>
						<div class="col-3 text-center mb-3">
							<p class="text-muted mb-1">Fungsi Kawasan</p>
							<h5 class="mb-1" id="fungsi_kws">$4,830</h5>
						</div>
						<div class="col-3 text-center mb-3">
							<p class="text-muted mb-1">Batang Total</p>
							<h5 class="mb-1" id="batang_total">$6,830</h5>
						</div>
						<div class="col-3 text-center mb-3">
							<p class="text-muted mb-1">Luas Blok/Petak</p>
							<h5 class="mb-1" id="luas">$4,830</h5>
						</div>
					</div>
				</div>
				<div class="container5 border-bottom mt-3 mb-3">
					<div class="mb-2">
						<i class="fas fa-tree mr-2"></i>
						<p class="d-inline"><b class="text-muted">Jenis Tanaman</b><span class="ml-2" id="jns_tanaman">null</span></p>
					</div>
					<div class="mb-2">
						<i class="fas fa-hard-hat mr-2"></i>
						<p class="d-inline"><b class="text-muted">Pelaksana</b><span class="ml-2" id="pelaksana">null</span></p>
					</div>
					<div class="mb-2">
						<i class="fas fa-file-contract mr-2"></i>
						<p class="d-inline"><b class="text-muted">Jenis Kontrak</b><span class="ml-2" id="jenis_kontrak">null</span></p>
					</div>
					<div class="mb-2">
						<i class="fas fa-building mr-2"></i>
						<p class="d-inline"><b class="text-muted">Kegiatan/Jenis Bangunan</b><span class="ml-2" id="kegiatan">null</span></p>
					</div>
				</div>
				<div class="container-image mb-3">
					<p class="pb-0 mb-1"><b>Dokumentasi</b></p>
					<img src="https://source.unsplash.com/xqW9FK2UjtU" alt="thumbnail" class="img-thumbnail mr-2" style="height: 100px;">
				</div>


				<!-- FOTO -->
				<table>
					<tr>
						<td id='foto1' align='center' ;></td>
						<td id='foto2' align='center' ;></td>
					</tr>
				</table>
			</div>

			<div id='map'></div>
			<script type="text/javascript">

			</script>
			<!-- BATAS BAGIAN PETA -->
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/map.js"></script>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- FlyTo -->
	<script src="assets/js/zoomto.js"></script>

	<!-- untuk memperbaiki tampilan peta yang tidak ter-load dgn baik -->
	<script>
		map.invalidateSize(true);
	</script>
</body>

</html>