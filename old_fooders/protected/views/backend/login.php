<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo SITE_URL.'/assets/fooders/img/favicon.ico';?>" type="image/x-icon">
    <title><?php echo Appname; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/bootstrap.min.css';?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/plugins/metisMenu/metisMenu.min.css';?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/sb-admin-2.css';?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    <?php echo $display_kr;?>
                        <form  method="post" action="">
                        <input type="hidden" name="kr_login_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="kr_email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="kr_password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="kr_login">Login</button>
                                
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/jquery-1.11.0.js';?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/bootstrap.min.js';?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/plugins/metisMenu/metisMenu.min.js';?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/sb-admin-2.js';?>"></script>

</body>

</html>
 