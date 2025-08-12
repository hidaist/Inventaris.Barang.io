<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventaris</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>


<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
	<div class="container">
		<div class="login-content">
			<div class="login-logo">
				<a href="login.html">
					<img class="align-content" src="images/logo.png" alt="">
				</a>
			</div>
<div class="noclas">
		<div class="login-form">
							
							<form action="validate.php" method="post">
							<div class="card-body" align="center">
									<div class="form" data-toggle="" hidden>
										<label class="noclas">
											<input class="fa fa-login" type="radio" name="level" value="admin" checked  />
											
											
											Admin A1
										</label>

										<label class=" ">
											<input class="fa fa-login" type="radio" name="level" value="admina2" />
											
											
											Admin A2
										</label>
									</div>
								</div>		
						<div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="User" required>
                        </div>
						<div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                          <!--      <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div> -->
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                
                    </form>
		</div>
                            <?php
		if(@$_GET['code'] == 1) {
		?>
		<div class="alert alert-danger">
			Username or Password Wrong !!!
		</div>
		<?php
		}
		if(@$_GET['code'] == 2) {
		?>
		<div class="alert alert-success">
			Anda Telah Keluar (Logout)
		</div>
		<?php
		}
		if(@$_GET['code'] == 3) {
		?>
		<div class="alert alert-danger">
			Anda harus Login dulu !!!
		</div>
		<?php
		}
		?>
                           
    
						</div>
					</div>
			  </div>
			</div>
</div>
		<!-- welcome modal start -->
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	</body>
</html>
