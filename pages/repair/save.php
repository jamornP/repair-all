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
            // print_r($_REQUEST);
            //     echo "<br>";
                $_POST['date_add']= date("Y-m-d H:i:s");
                if(isset($_POST['form_name'])){
                    switch ($_POST['form_name']) {
                        
                        case "electricity":
                            unset($_POST['form_name']);
                            // print_r($_POST);
                            // echo "ไฟฟ้า";
                            $ck = $repairObj->addRepair($_POST);
                            $ds['r_id'] = $ck;
                            $ds['s_id'] = 1;
                            $ds['ds_remark'] = "แจ้งใหม่";
                            $ds['ds_num'] = 1;
                            $ds['date_update'] = date("Y-m-d H:i:s");
                            $ds['st_id'] = $_SESSION['st_id'];
                            $ds['ds_count_time'] = "";
                            $ds_id = $datastatusObj->addDataStatus($ds);

                            $mes="บันทึกข้อมูลเรียบร้อย ".$ck."-".$ds_id;
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
                                    setTimeout(function(){location.href='/repair-all/pages/repair/electricity.php'} , 1000);
                                </script>
                            ";
                            break;
                        case "air":
                            
                            break;
                        case "computer":
                            
                            break;
                        case "computer-classroom":
                            
                            break;
                        }
                }else{
                    echo "
                        <script type='text/javascript'>
                            setTimeout(function(){location.href='/repair-all/pages/repair/electricity.php'} , 1000);
                        </script>
                    ";
                }
            ?>


    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
 
</body>

</html>
