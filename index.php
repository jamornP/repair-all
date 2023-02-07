<?php  
    session_start(); 
    require $_SERVER['DOCUMENT_ROOT']."/m/data.php";
    // require $_SERVER['DOCUMENT_ROOT']."/m/pages/auth/auth.php";
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

<body class="theme-blue-grey">
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/page-loader.php";?>
   
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/m/component/s-left-right.php";?>

    <section class="content font-kanit">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD<?php echo $_SESSION['st_status'];?></h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Staff
                                <small>With a bit of extra markup, it's possible to add any kind of HTML content like headings, paragraphs, or buttons into thumbnails.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row">
                                <?php
                                // print_r($staff);
                                $l=1;
                                    foreach ($staff as $value) {
                                        $ll = $l % 4;
                                        echo '
                                        <div class="col-sm-6 col-md-3 col-lg-3">
                                            <div class="thumbnail">
                                                <div class="image text-center">
                                                    <img src="images/staff/'.$value['id'].'.jpg" width="100" height="130">
                                                </div>
                                                <div class="caption">
                                                    <h3>'.$value['name'].'</h3>
                                                    
                                                    <p>
                                                        <div class="table-responsive">
                                                            <table class="table fs-10 table-hover">                                                      
                                                                <tbody>';
                                                                $k = 2;
                                                        foreach($data2 as $d){
                                                            if($d['id']==$value['id']){
                                                                echo '
                                                                    <tr>
                                                                        <td>'.$d['detail'].'</td>
                                                                    </tr>
                                                                ';
                                                            }
                                                            
                                                            
                                                        }                                                                 
                                                               
                                                        echo '  </tbody>
                                                            </table>
                                                        </div>
                                                    </p>
                                                    <p>
                                                        <a href="'.$link.'" class="btn btn-primary waves-effect" role="button">'.$link.'</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                        $l++;
                                        if($ll == 0){
                                            echo'
                                            </div>
                                            <div class="row">
                                            ';
                                        }
                                    }
                                ?>
                                <!-- <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        <img src="images/staff/1.jpg" width="100" height="100">
                                        <div class="caption">
                                            <h3>Thumbnail label</h3>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s
                                            </p>
                                            <p>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        <img src="images/staff/2.jpg"  width="100" height="100">
                                        <div class="caption">
                                            <h3>Thumbnail label</h3>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s
                                            </p>
                                            <p>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        <img src="images/staff/3.jpg"  width="100" height="100">
                                        <div class="caption">
                                            <h3>Thumbnail label</h3>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s
                                            </p>
                                            <p>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        <img src="images/staff/4.jpg"  width="100" height="100">
                                        <div class="caption">
                                            <h3>Thumbnail label</h3>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s
                                            </p>
                                            <p>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
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