<?php  
    session_start(); 
    if(!($_SESSION['st_status']=="administrator")){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/m/pages/repair'} , 500);
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
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/link-css.php";?>
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/s-left-right.php";?>
    
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
    <?php
        $dataf = $usersObj->getUsersById($_GET['id']);
       
    ?>
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
                                <h3><?php echo $dataf['name_TH'];?></h3>
                                <p><?php echo $dataf['position'];?></p>
                                <p><?php echo $dataf['st_status'];?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                        </div>
                    </div>

                    
                </div>
                
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <?php
                                
                                if(isset($_POST['update'])){
                                    unset($_POST['update']);
                                    print_r($_POST);
                                    $ckuser = $usersObj->updateStTypeUsers($_POST);
                                    $mes="Update Data Success";
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
                                            setTimeout(function(){location.href='/m/pages/admin/manage.php?id={$_POST['st_id']}'} , 2000);
                                        </script>
                                    ";
                                }
                                if(isset($_POST['ma_menu'])){
                                    unset($_POST['ma_menu']);
                                    print_r($_POST);
                                    $ckadd = $menuObj->addMenuSt($_POST);
                                    $mes="Save Data Success";
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
                                            setTimeout(function(){location.href='/m/pages/admin/manage.php?id={$_POST['st_id']}'} , 2000);
                                        </script>
                                    ";
                                }
                            ?>
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" data-toggle="tab">
                                            <i class="material-icons">home</i> HOME
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#settings" data-toggle="tab">
                                            <i class="material-icons">settings</i> SETTINGS
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="<?php echo $_SESSION['image'];?>" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#"><?php echo $dataf['name_TH'];?></a>
                                                        </h4>
                                                        <?php echo $dataf['position'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>ข้อมูลพื้นฐาน</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <?php
                                                            $dataM5 = $menuObj->getMenuByStId($_GET['id']);
                                                            $s5="";
                                                            foreach($dataM5 as $m5){
                                                                if($s5==""){
                                                                    $s5 = $m5['m_name'];
                                                                }else{
                                                                    $s5 = $s5.", ".$m5['m_name'];
                                                                }
                                                            }
                                                        ?>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status : <?php echo $dataf['st_status'];?></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type : <?php echo $dataf['st_type'];?></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menu : <?php echo $s5;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="settings">
                                        <form class="form-horizontal" action="manage.php" method="POST">
                                            <div class="card">
                                                <div class="header">
                                                    
                                                </div>
                                                <div class="body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>
                                                                <b>st_Status <?php echo $dataf['st_status'];?></b>
                                                            </p>
                                                            <select class="form-control show-tick" name="st_status">
                                                                <?php
                                                                    $datastatus = array("administrator","it","pr","building","staff");
                                                                    
                                                                    for($i=0;$i<count($datastatus);$i++){
                                                                       
                                                                        $selected =($datastatus[$i]==$dataf['st_status']) ?
                                                                            "selected" : "";
                                                                        echo "
                                                                            <option value='{$datastatus[$i]}' {$selected}>{$datastatus[$i]}</option>
                                                                        ";
                                                                    }
                                                                   
                                                                    if(empty($dataf['st_status'])){
                                                                        echo "
                                                                            <option value='' selected>เลือก</option>
                                                                        ";
                                                                    }else{
                                                                        echo "
                                                                            <option value=''>เลือก</option>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </select>
                                                           
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>
                                                                <b>st_Type<?php //echo $dataf['st_type'];?></b>
                                                            </p>
                                                            <select class="form-control show-tick" name="st_type">
                                                            <?php
                                                                $dataM3 = $menuObj->getMenu();
                                                                foreach($dataM3 as $m3){
                                                                    $selected =($m3['m_code']==$dataf['st_type']) ?
                                                                        "selected" : "";
                                                                   
                                                                    echo "
                                                                        <option value='{$m3['m_code']}' {$selected}>{$m3['m_code']}</option>
                                                                    ";
                                                                }
                                                                if(empty($dataf['st_type'])){
                                                                    echo "
                                                                        <option value='' selected>เลือก</option>
                                                                    ";
                                                                }else{
                                                                    echo "
                                                                        <option value=''>เลือก</option>
                                                                    ";
                                                                }
                                                            ?>
                                                            </select>
                                                            <input type="hidden" class="form-control" id="st_id" name="st_id" placeholder="" value="<?php echo $_GET['id'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-10 col-sm-9">
                                                            <button type="submit" class="btn btn-danger" name="update">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="form-horizontal" action="manage.php" method="POST">
                                            <div class="card">
                                                <div class="header">
                                                </div>
                                                <div class="body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>
                                                                    <b>Menu</b>
                                                                </p>
                                                                <select class="form-control show-tick" name="m_id">
                                                                <?php
                                                                    $dataM2 = $menuObj->getMenu();
                                                                    $i2=0;
                                                                    foreach($dataM2 as $m2){
                                                                        $i2++;
                                                                        echo "
                                                                            <option value='{$m2['m_id']}' >{$m2['m_name']}</option>
                                                                        ";
                                                                    }
                                                                    
                                                                ?>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" class="form-control" id="st_id" name="st_id" placeholder="" value="<?php echo $_GET['id'];?>" required>
                                                        </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-10 col-sm-9">
                                                            <button type="submit" class="btn btn-danger" name="ma_menu">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="header">
                                                <h2>Menu Staff สำหรับ User นี้</h2>  
                                            </div>
                                            <div class="body table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ชื่อเมนู</th>
                                                            <th>Link เมนู</th>
                                                            <th>Icon เมนู</th>
                                                            <th>Code เมนู</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $dataM4 = $menuObj->getMenuByStId($_GET['id']);
                                                            $i=0;
                                                            foreach($dataM4 as $m4){
                                                                $i++;
                                                                echo "
                                                                <tr>
                                                                    <th scope='row'>{$m4['m_id']}</th>
                                                                    <td>{$m4['m_name']}</td>
                                                                    <td>{$m4['m_link']}</td>
                                                                    <td><i class='material-icons'>{$m4['m_icon']}</i></td>
                                                                    <td>{$m4['m_code']}</td>
                                                                </tr>
                                                                ";
                                                            }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/script-js.php";?>
</body>

</html>
