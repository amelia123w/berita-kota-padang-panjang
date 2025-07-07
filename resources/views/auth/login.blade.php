@guest
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login Berita Padang Panjang</title>

	<!-- Site favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets-admin')}}/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{url('assets-admin')}}/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{url('assets-admin')}}/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets-admin')}}/vendors/styles/style.css">
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="/">
					<img src="{{url('assets-admin')}}/vendors/images/berita.svg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{url('assets-admin')}}/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Silahkan Login</h2>
						</div>
							@if (session('error'))
					      <div class="alert alert-primary">
					         {{ session('error')}}
					         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					         <span aria-hidden="true">&times;</span>
					         </button>
					      </div>
					    @endif
					    @if (session('success'))
					      <div class="alert alert-success">
					         {{ session('success')}}
					         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					         <span aria-hidden="true">&times;</span>
					         </button>
					      </div>
					    @endif
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="input-group custom">
								<input type="text" autofocus class="form-control form-control-lg" placeholder="Username" name="username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
						        <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" id="password">
						        <div class="input-group-append custom" onclick="togglePassword()">
						            <span class="input-group-text"><i class="dw dw-padlock1" id="toggleIcon"></i></span>
						        </div>
						    </div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0 mt-3">
										<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("dw-padlock1");
                toggleIcon.classList.add("dw-unlock1");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("dw-unlock1");
                toggleIcon.classList.add("dw-padlock1");
            }
        }
    </script>
	<script src="{{url('assets-admin')}}/vendors/scripts/core.js"></script>
	<script src="{{url('assets-admin')}}/vendors/scripts/script.min.js"></script>
	<script src="{{url('assets-admin')}}/vendors/scripts/process.js"></script>
	<script src="{{url('assets-admin')}}/vendors/scripts/layout-settings.js"></script>
	<script>
	    window.setTimeout(function() {
	      $(".alert").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	      });
	    }, 3000);
	  </script>
  <script>
  document.addEventListener('keydown', function(e) {
      // Cek jika tombol yang ditekan adalah Ctrl+U
      if (e.ctrlKey && e.key === 'u') {
          e.preventDefault();
          return false;
      }
  });
  </script>
  <script>
  document.addEventListener('keydown', function(e) {
      if (e.key === 'F12' || (e.ctrlKey && (e.key === 'U' || e.key === 'S' || e.key === 'I'))) {
          e.preventDefault();
          return false;
      }
  });

  document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
  });
  </script>
</body>
</html>
@endguest
@auth
  <script>window.location = "/admin/home";</script>
@endauth
