<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta name="author" content="" />
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title;?></title>
	<link href="<?= base_url('assets/temp/css/plugins.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/temp/css/style.css');?>" rel="stylesheet">
</head>
<body>
	<div class="body-inner">
		<section class="fullscreen" data-bg-parallax="<?= base_url('assets/temp/images/pages/1.jpg');?>">
			<div class="container">
				<div>
					<div class="row">
						<div class="col-lg-5 center p-50 background-white b-r-6">
							<h3 class="text-center"><a class="text-black" href="<?= base_url('home');?>"><?= $subtitle;?></a></h3>
							<form method="post" action="<?= base_url('login/execute');?>">
							<!-- validations -->
								<div class="form-group">
									<label class="sr-only">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group m-b-5">
									<label class="sr-only">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="text-left form-group">
									<button type="submit" class="btn btn-block">Login</button>
								</div>
							</form>
							<p class="small">Belum Punya Akun? <a href="<?= base_url('register');?>">Register Disini</a>
							</p>
							<div class="form-group row">
								<div class="col-md-8">
									<button class="btn btn-primary social-facebook"><a class="text-white" href="#"><i class="fab fa-facebook-f"></i></a></button>
									<button class="btn m-l-20 btn-light"><a href="#"><img width="15" height="15" src="<?= base_url('assets/temp/images/google.png');?>"></a></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
	<script src="<?= base_url('assets/temp/js/jquery.js');?>"></script>
	<script src="<?= base_url('assets/temp/js/plugins.js');?>"></script>
	<script src="<?= base_url('assets/temp/js/functions.js');?>"></script>
</body>
</html>