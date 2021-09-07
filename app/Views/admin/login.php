<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/animate.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/line-awesome.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/jquery.fancybox.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/slicknav.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/loogi-style.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/loogi-responsive.css');?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,500i,600,700,800&amp;display=swap"
        rel="stylesheet">
     <!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- Styles -->
	<style type="text/css">
		#success{background: green;}
		#error{background: red;}
		#warning{background: coral;}
		#info{background: cornflowerblue;}
		#question{background: grey;}
	</style>
</head>

<body>
    <div class="page-wrapper">
        <div class="preloader">
            <div class="inner"> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
        </div>
    </div>
    <section>
        <div class="login-area-2 login-7 bg-black vh">
            <div class="container-fluid no-padding no-gutters">
                <div class="login-2 sign-in-form">
                    <form method="post" action="<?= base_url('admin/adminlogin/execute');?>">
                        <div class="login-form-1">
                            <div class="container-fluid no-padding no-gutters">
                                <div class="row no-gutters">
                                    <div class="col-md-6 offset-md-3 align-items-center">
                                        <div class="text-middle extra-padding-6 bg-color-gray text-margin">
                                            <div class="text-title mt-3 text-left">
                                                <h2 class="bg-color-white text-center">INDRA JATIM</h2>
                                            </div>
                                            <div class="form-group"> <label class="bg-color-white">Username</label>
                                                <input type="text" name="username" required
                                                    class="bg-black form-control" placeholder="Username"> </div>
                                            <div class="form-group"> <label class="bg-color-white">Password</label>
                                                <input type="password" name="password" required
                                                    class="bg-black form-control" placeholder="Password"> </div>
                                            <div class="send-btn"> <button type="submit"
                                                    class="default-btn">Login</button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url('assets/login/js/vendor/modernizr-3.6.0.min.js');?>"></script>
    <script src="<?= base_url('assets/login/js/vendor/jquery-3.5.1.min.js');?>"></script>
    <script src="<?= base_url('assets/login/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/login/js/jquery.slicknav.min.js');?>"></script>
    <script src="<?= base_url('assets/login/js/fancyBox%20v2.1.5.js');?>"></script>
    <script src="<?= base_url('assets/login/js/loogi-main.js');?>"></script>
    <script src="<?= base_url('assets/login/js/plugins.js');?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        <?php if(session()->getFlashdata('success')){ ?>
            toastr.success("<?php echo session()->getFlashdata('success'); ?>");
        <?php }else if(session()->getFlashdata('error')){  ?>
            toastr.error("<?php echo session()->getFlashdata('error'); ?>");
        <?php }else if(session()->getFlashdata('warning')){  ?>
            toastr.warning("<?php echo session()->getFlashdata('warning'); ?>");
        <?php }else if(session()->getFlashdata('info')){  ?>
            toastr.info("<?php echo session()->getFlashdata('info'); ?>");
        <?php } ?>
    </script>
</body>

</html>