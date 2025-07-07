<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Berita Padang Panjang</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{url('assets-admin')}}/vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{url('assets-admin')}}/vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{url('assets-admin')}}/vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{url('assets-admin')}}/vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{url('assets-admin')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{url('assets-admin')}}/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>

		<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
		
		<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/src/plugins/datatables/css/responsive.bootstrap4.min.css">

		<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/vendors/styles/style.css" />
		
		<style type="text/css">
			.table td {
			    font-size: 14px;
			    font-weight: 500;
			    padding: 0.5rem;
			}
			.btn-group-xs > .btn, .btn-xs {
				padding: 1px 7px;
				font-size: 12px;
				line-height: 1.9;
				border-radius: 3px;
			}
			.blink {
	    animation: blinker 3s linear infinite;
			}

			@keyframes blinker {
			    50% {
			        opacity: 0;
			    }
			}

		</style>
		<style>
		    /* Hapus spinner di input number untuk browser webkit (Chrome, Safari, dll) */
		    input[type=number]::-webkit-outer-spin-button,
		    input[type=number]::-webkit-inner-spin-button {
		        -webkit-appearance: none;
		        margin: 0;
		    }

		    /* Hapus spinner di input number untuk Firefox */
		    input[type=number] {
		        -moz-appearance: textfield;
		    }
		</style>
		<style>
	      .select2-container {
	          width: 100% !important; /* Memastikan Select2 menggunakan lebar penuh */
	      }
	  </style>
	  <style>
	    .input-error {
	        border-color: red;
	        background-color: #f8d7da; /* Warna latar belakang merah muda */
	    }
		</style>
	</head>
	<body>
		@if ($activePage == 'dashboard')
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="{{url('assets-admin')}}/vendors/images/berita.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>
		@endif

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="{{url('assets-admin')}}/vendors/images/user.png" alt="" />
							</span>
							<span class="user-name">{{Auth::User()->name}}</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="/admin/change"><i class="dw dw-password"></i> Ganti Password</a>
							<a class="dropdown-item" href="#"><i class="dw dw-book"></i> Manual Book</a>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
	              document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> Log Out</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			          @csrf
			        </form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-primary">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-primary" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="/">
					<img src="{{url('assets-admin')}}/vendors/images/berita.svg" alt="" class="dark-logo" />
					<img
						src="{{url('assets-admin')}}/vendors/images/berita-white.svg"
						alt=""
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="/admin/home" class="dropdown-toggle no-arrow @if ($activePage == 'dashboard') active @endif">
								<span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
							</a>
						</li>
						<!-- <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-file"></span><span class="mtext">Data Master</span>
							</a>
							<ul class="submenu">
								<li><a href="/admin/opd" class="@if ($activePage == 'opd') active @endif">Data OPD</a></li>
								<li><a href="/admin/diskon" class="@if ($activePage == 'diskon') active @endif">Data Diskon</a></li>
								<li><a href="/admin/metode" class="@if ($activePage == 'metode') active @endif">Metode Pembayaran</a></li>
							</ul>
						</li> -->
						<li>
							<a href="/admin/opd" class="dropdown-toggle no-arrow @if ($activePage == 'opd') active @endif">
								<span class="micon dw dw-id-card"></span><span class="mtext">Data OPD</span>
							</a>
						</li>
						<li>
							<a href="/admin/account" class="dropdown-toggle no-arrow @if ($activePage == 'account') active @endif">
								<span class="micon dw dw-user1"></span><span class="mtext">Data Account</span>
							</a>
						</li>
						<li>
							<a href="/admin/berita" class="dropdown-toggle no-arrow @if ($activePage == 'berita') active @endif">
								<span class="micon dw dw-notepad-2"></span><span class="mtext">Data Berita</span>
							</a>
						</li>
						<li>
    					<a href="/admin/padangpanjangtv" class="dropdown-toggle no-arrow @if ($activePage == 'padangpanjangtv') active @endif">
        					<span class="micon dw dw-video-camera"></span><span class="mtext">Padang Panjang TV</span>
    					</a>
					</li>
					<li>
    						<a href="/admin/majalah" class="dropdown-toggle no-arrow @if ($activePage == 'majalah') active @endif">
        						<span class="micon dw dw-book"></span><span class="mtext">E-majalah</span>
    						</a>
						</li>
						<li>
    <a href="/admin/bulletin" class="dropdown-toggle no-arrow @if ($activePage == 'bulletin') active @endif">
        <span class="micon dw dw-notepad-2"></span><span class="mtext">E-bulletin</span>
    </a>
</li>

<li>
    <a href="/admin/kliping" class="dropdown-toggle no-arrow @if ($activePage == 'kliping') active @endif">
        <span class="micon dw dw-clipboard"></span><span class="mtext">E-kliping</span>
    </a>
</li>

					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				@yield('content')
				<div class="footer-wrap pd-20 mb-20 card-box">
					Berita Padang Panjang - Copyright © {{date('Y')}}
					<a href="https://diskominfo.padangpanjang.go.id" style="text-decoration: none" target="_blank"
						>Kominfo Theme</a
					>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="{{url('assets-admin')}}/vendors/scripts/core.js"></script>
		<script src="{{url('assets-admin')}}/vendors/scripts/script.min.js"></script>
		<script src="{{url('assets-admin')}}/vendors/scripts/process.js"></script>
		<script src="{{url('assets-admin')}}/vendors/scripts/layout-settings.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="{{url('assets-admin')}}/src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="{{url('assets-admin')}}/vendors/scripts/datatable-setting.js"></script>
		<script>
	    window.setTimeout(function() {
	      $(".alert").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	      });
	    }, 5000);
	  </script>
	  <script>
	    $(document).ready(function() {
	        $('.select2').select2();
	    });
		</script>
	</body>
</html>