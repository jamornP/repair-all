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
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/link-css.php";?>
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/s-left-right.php";?>

    <section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <?php $year_term = yearterm(date('Y-m-d')); ?>
                <h2>กำลังบันทึกข้อมูล...</h2>
            </div> -->
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
                switch ($_POST['menu']) {
                    case "electricity":
                        unset($_POST['menu']);
                        if($_POST['action']=="add"){
                            unset($_POST['action']);
                            $num = $datastatusObj->getNumById($_POST['r_id']);
                            $_POST['ds_num'] = $num['ds_num']+1;
                            $_POST['date_update'] = date("Y-m-d H:i:s");
                            $_POST['st_id'] = $_SESSION['st_id'];
                            $_POST['ds_count_time'] = time_dif_TH($num['date_update'],$_POST['date_update']);
                            $r_idl = go($_POST['r_id']);
                            // print_r($_POST);
                            $ds_id = $datastatusObj->addDataStatus($_POST);
                            $dataU['r_id'] = $_POST['r_id'];
                            $dataU['s_id'] = $_POST['s_id'];
                            $ckUp = $repairObj->updateRepairStatus($dataU);
                            // echo "<br>".$ds_id;
                            $mes="บันทึกข้อมูลเรียบร้อย ";
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
                                    setTimeout(function(){location.href='/m/pages/manage/m_electricity.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                        if($_POST['action']=="edit"){
                            unset($_POST['action']);
                            print_r($_POST);
                            $r_idl = go($_POST['r_id']);
                            unset($_POST['r_id']);
                            $cku_e = $datastatusObj->updateDataStatus($_POST);
                            $mes="แก้ไขข้อมูลเรียบร้อย ";
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
                                    setTimeout(function(){location.href='/m/pages/manage/m_electricity.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                   
                }
                

                    
                    
               
                
            ?>
            
            


    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/script-js.php";?>
 
</body>

</html>
