<?php  
    session_start(); 
    if(!($_SESSION['st_status']=="administrator")){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/repair-all/pages/repair'} , 500);
            </script>
        ";
    }
?>
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>App Science KMITL</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/link-css.php";?>
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/s-left-right.php";?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <?php
                if(isset($_POST['email'])){
                    // echo $_POST['email'];
                    $ck = $usersObj->ResetPassword($_POST['email']);
                    if($ck){
                        $mes="Reset Password Success";
                        echo "
                            <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                <span data-notify='icon'></span> 
                                <span data-notify='title'></span> 
                                <span data-notify='message'>{$mes}</span>
                                <a href='#' target='_blank' data-notify='url'></a>
                            </div>";
                        echo "  
                            <script type='text/javascript'>
                                setTimeout(function(){location.href='/repair-all/pages/admin/reset-password.php'} , 2000);
                            </script>
                        ";
                    }else{
                        $mes="ไม่มี Email นี้กรุณาตรวจสอบ Email";
                        echo "
                            <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-danger p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                <span data-notify='icon'></span> 
                                <span data-notify='title'></span> 
                                <span data-notify='message'>{$mes}</span>
                                <a href='#' target='_blank' data-notify='url'></a>
                            </div>";
                        echo "  
                            <script type='text/javascript'>
                                setTimeout(function(){location.href='/repair-all/pages/admin/reset-password.php'} , 3000);
                            </script>
                        ";
                    }
                    
                            
                }
                ?>
            <!-- Widgets -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">MESSAGES</div>
                            <div class="number">15</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">CPU USAGE</div>
                            <div class="number">92%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">ALARM</div>
                            <div class="number">07:00 AM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">gps_fixed</i>
                        </div>
                        <div class="content">
                            <div class="text">LOCATION</div>
                            <div class="number">Turkey</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Reset Password
                            </h2>
                            <div class="header-dropdown m-r--5">
                            </div>
                        </div>
                        <div class="body">
                            <form action="reset-password.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <label for="email_address">Email Address</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="email_address" class="form-control" placeholder="Enter your email address" name="email" autofocus required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
    
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
</body>

</html>