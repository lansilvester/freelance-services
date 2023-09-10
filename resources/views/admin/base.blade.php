<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="Freelancer" content="AdminKit">
	<meta name="keywords"
		content="bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('admin/img/icons/icon-48x48.png') }}" />
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Admin Dashboard</title>
	<style>
	
	</style>
	<link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		{{-- SIDEBAR NAVIGASI --}}
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('dashboard.index') }}">
					<span class="align-middle">Dashboard Freelancer</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Halaman
					</li>

					<li class="sidebar-item  {{ Request::is('dashboard*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('dashboard.index') }}">
							<i class="align-middle" data-feather="home"></i> <span
								class="align-middle">Dashboard</span>
						</a>
					</li>
					@if(Auth::user()->role == 'super_admin')
					<li class="sidebar-item  {{ Request::is('kategori*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('kategori.index') }}">
							<i class="align-middle" data-feather="list"></i> <span
								class="align-middle">Kategori</span>
						</a>
					</li>
					@endif
					<li class="sidebar-item  {{ Request::is('vendor*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('vendor.index') }}">
							<i class="align-middle" data-feather="award"></i> <span
								class="align-middle">Vendor</span>
						</a>
					</li>
					<li class="sidebar-item  {{ Request::is('service*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('service.index') }}">
							<i class="align-middle" data-feather="bell"></i> <span
								class="align-middle">Service</span>
						</a>
					</li>
			</div>
		</nav>

		<div class="main">
			{{-- Topbar --}}
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
								data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
								data-bs-toggle="dropdown">
								<img src="{{ asset('storage/'.Auth::user()->foto_profil) }}" class="avatar img-fluid rounded me-1"
									alt="profile picture" /> <span class="text-dark">{{ Auth::user()->email }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('profile.show', Auth::user()->id ) }}">
									<i class="align-middle me-1" data-feather="user"></i> Profile
								</a>
								<a class="dropdown-item" href="{{ route('logout') }}">
									<i class="align-middle me-1" data-feather="log-out"></i> Logout
								</a>
								
							</div>
						</li>
					</ul>
				</div>
			</nav>

			@yield('content')

			{{-- Footer --}}
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							&copy; {{ date('Y') }}
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('admin/js/app.js') }}"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>

</body>

</html>