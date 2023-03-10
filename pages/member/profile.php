<?php  
    session_start(); 

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
    
   <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid font-kanit">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo $_SESSION['image'];?>" width="128" height="128" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $_SESSION['name'];?></h3>
                                <p><?php echo $_SESSION['position'];?></p>
                                <p><?php echo $_SESSION['st_status'];?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <!-- <ul>
                                <li>
                                    <span>Followers</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Following</span>
                                    <span>1.201</span>
                                </li>
                                <li>
                                    <span>Friends</span>
                                    <span>14.252</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button> -->
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>???????????????????????????????????????</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        ????????????????????????
                                    </div>
                                    <div class="content">
                                        ???.????????? ?????????????????????????????????????????????????????????, ?????????????????????????????????????????????????????????????????????
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        ?????????????????????
                                    </div>
                                    <div class="content">
                                        ???????????????????????????????????????, ?????????
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content" style="line-height: 1.8;">
                                        <span class="label bg-red" >HTML</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-cyan">SQL</span>
                                        <span class="label bg-amber">Xampp</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-green">????????????????????????????????????</span>
                                        <span class="label bg-orange">?????????????????????</span>
                                        <span class="label bg-blue-grey">??????????????????????????????????????????????????????????????????</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                    "??????????????????????????????" ?????????????????????????????????????????????????????????????????????????????? ??????????????????????????????????????????????????????????????????????????????????????????
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_POST['changePass'])){
                        // echo "changePass ok"."<br>";
                        $_POST['email']=$_SESSION['email'];
                        unset($_POST['changePass']);
                        // print_r($_POST);
                        if($_POST['NewPassword']==$_POST['NewPasswordConfirm']){
                            $ckPass = $usersObj->changePassword($_POST);
                            // echo $ckPass;
                            if($ckPass){
                                $mes="Change Password Success";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>??</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>";
                                echo "  
                                    <script type='text/javascript'>
                                        setTimeout(function(){location.href='/repair-all/pages/member/profile.php'} , 2000);
                                    </script>
                                ";
                            }
                        }else{
                            $mes="???????????????????????????????????? Password ????????????????????????";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-danger p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>??</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>
                                ";
                        }
                    }
                    if(isset($_POST['update'])){
                        // echo "update ok"."<br>";
                        $_POST['st_id']=$_SESSION['st_id'];
                        unset($_POST['update']);
                        // print_r($_POST);
                        $ckUser = $usersObj->updateUsers($_POST);
                            // echo $ckUser;
                            if($ckUser){
                                $mes="Update Profile Success";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>??</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>";
                                echo "  
                                    <script type='text/javascript'>
                                        setTimeout(function(){location.href='/repair-all/pages/member/profile.php'} , 2000);
                                    </script>
                                ";
                            }else{
                                echo $ckUser;
                                $mes="Update Profile ???????????????????????????";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-danger p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>??</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>
                                ";
                            }
                    }

                ?>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="../../images/user-lg.jpg" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">Marc K. Hammond</a>
                                                        </h4>
                                                        Shared publicly - 01 Oct 2018
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <iframe width="100%" height="360" src="https://www.youtube.com/embed/SbVQsw4y6zk" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>125 Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>8 Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal" action="profile.php" method="POST">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">???????????? - ????????????????????? TH</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="name_TH" placeholder="???????????? - ?????????????????????" value="<?php echo $_SESSION['name_TH'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname2" class="col-sm-2 control-label">???????????? - ????????????????????? EN</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname2" name="name_EN" placeholder="???????????? - ?????????????????????" value="<?php echo $_SESSION['name_EN'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="<?php echo $_SESSION['email'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="position" class="col-sm-2 control-label">?????????????????????</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="<?php echo $_SESSION['position'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tel" class="col-sm-2 control-label">?????????????????????????????????</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="tel" value="<?php echo $_SESSION['tel'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger" name="update">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" action="profile.php" method="POST">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger" name="changePass">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
</body>

</html>
