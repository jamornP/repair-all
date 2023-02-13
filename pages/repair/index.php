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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row">
            <?php
                $dataMenu = $menuObj->getMenu();
                $i =1;
                foreach($dataMenu as $menu){
                    $s['s_id'] = $i++;
                    $s['s_name'] = "menu";
                    $datacolor = statusRepair($s);
                    echo "
                        <a href='{$menu['link']}'>
                            <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                                <div class='info-box {$datacolor['color']} hover-zoom-effect'>
                                    <div class='icon'>
                                        <i class='material-icons'>{$menu['m_icon']}</i>
                                    </div>
                                    <div class='content'>
                                        <div class='text'>แจ้งซ่อม</div>
                                        <div class='number'>{$menu['m_name']}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    ";
                }
            ?>
            
                
            </div>
            
            
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
</body>

</html>