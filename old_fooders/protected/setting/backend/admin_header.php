<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if(!$session->Check() && $_SESSION['type']!=='admin'){
	$session->redirect('login',admin);
}
    $mail_one = new PHPMailer(true);
	//Server settings
	$mail_one->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
	$mail_one->isSMTP();                    // Send using SMTP
	$mail_one->Host       = smtp_host;                    // Set the SMTP server to send through
	$mail_one->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail_one->Username   = smtp_username;                     // SMTP username
	$mail_one->Password   = smtp_password;                               // SMTP password
	$mail_one->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	$mail_one->Port       = smtp_port;
?>
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

    <!-- Timeline CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/plugins/timeline.css';?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/sb-admin-2.css';?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/plugins/morris.css';?>" rel="stylesheet">
      <!-- DataTables CSS -->
    <link href="<?php echo SITE_URL.'/assets/backend/css/plugins/dataTables.bootstrap.css';?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo SITE_URL.'/assets/backend/font-awesome-4.1.0/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">
	<link href="<?php echo SITE_URL.'/assets/backend/css/chosen.css';?>" rel="stylesheet">
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding-top: 5px;" href="<?php echo $link->link('dashboard',admin);?>"><img src="<?php echo SITE_URL.'/assets/backend/img/admin_logo.png';?>"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       Order Status <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks order_status"></ul>
                    
                </li>
                <li class="dropdown user_data"></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo $link->link('setting',admin);?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $link->link('logout',admin);?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
           
           <?php if($query3=='careid' || $query2ans=="send_email"){?>
             <script src="<?php echo SITE_URL.'/assets/backend/js/editor/nicEdit.js'?>" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() {
		new nicEditor({buttonList : ['bold','italic','underline','left','center','right','ol','ul','fontSize','fontFamily','fontFormat','superscript','subscript','indent','outdent','link','unlink','striketrhough','forecolor','bgcolor','image','upload','xhtml']}).panelInstance('home1');
		
	});
	</script>
 <?php }?>           
            