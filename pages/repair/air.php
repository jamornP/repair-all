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
                <h2>แจ้งซ่อมเครื่องปรับอากาศ</h2>
            </div>

            <!-- Widgets -->
            <!-- <div class="row">
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
            </div> -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                รายการแจ้งซ่อมทั้งหมด
                            </h2>
                            <div class="header-dropdown m-r--5">
                           
                            <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add_circle_outline</i>
                                    <span>แจ้งซ่อม</span></button>
                                <!-- <a href="" class="btn btn-danger fs-16 text-white" >
                                    <i class="material-icons text-white">call</i> แจ้งซ่อม
                                </a> -->
                            </div>
                        </div>
                        <div class="body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่แจ้ง</th>
                                            <th width="" scope="col">รายละเอียด</th>
                                            <th width="8%" scope="col">ห้อง</th>
                                            <th width="12%" scope="col">อาคาร</th>
                                            <th width="8%" scope="col">ประเถท</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //     $year_term = yearterm(date('Y-m-d'));
                                        //     $datar = $repairObj->getRepairByYear($year_term);
                                        // $i = 0;
                                        // foreach($datar as $data){
                                        //     $i++;
                                        //     $date_add = datethai($data['date_add']);
                                        //     $datefull = datethai_time($data['date_add']);
                                        //     $s = "";
                                        //     $dataSt1 = $datastatusObj->getDsByRid($data['r_id']);
                                        //     $s = btStatus($dataSt1);
                                        //     echo "
                                        //         <tr>
                                        //             <th scope='row'>{$i}</th>
                                        //             <td class='fs-10 text-center'>{$datefull}</td>
                                        //             <td>{$data['r_remark']}</td>
                                        //             <td class='fs-12'>{$data['room']}</td>
                                        //             <td class='fs-10'>{$data['b_name']}</td>
                                        //             <td class='fs-12'>{$data['t_name']}</td>
                                        //             <td class='fs-12'>{$data['n_name']}</td>
                                        //             <td class='fs-12'>{$data['fullname']}</td>
                                        //             <td class='fs-12 align-justify'>{$s} {$data['s_name']}</td>
                                                
                                        //         </tr>
                                        //     ";
                                        // }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            
        </div>
    </section>
    <!-- defaultModal -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">กรอกข้อมูลการแจ้งซ่อม</h4>
                </div>
                <form id="add" action="save.php" method="post">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>ปีงบประมาณ</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="year_term" value="<?php echo yearterm(date('Y-m-d'));?>" name="year_term" required readonly>
                                        <input type="hidden" class="form-control" id="s_id" value="1" name="s_id" required readonly>
                                        <input type="hidden" class="form-control" id="form_name" value="electricity" name="form_name" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>ชื่อ - สกุล</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" value="<?php echo $_SESSION['name_TH'];?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>หน่วยงาน</b>
                                </p>
                                <select class="form-control show-tick" name="d_id">
                                    <?php
                                        $datad = $departmentObj->getDepartment();
                                        foreach($datad as $depart){
                                            $selected =($depart['d_id']==$_SESSION['d_id']) ?
                                            "selected" : "";
                                            echo "
                                                <option value='{$depart['d_id']}' {$selected}>{$depart['d_name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>เบอร์ติดต่อ</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="tel" placeholder="" name="tel" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>ห้อง - ชั้น</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="room" placeholder="" name="room" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>อาคาร</b>
                                </p>
                                <select class="form-control show-tick" name="b_id">
                                    <?php
                                        $building = $buildingObj->getBuilding();
                                        foreach($building as $datab){
                                            $databc = $datab['b_code']." ".$datab['b_name'];
                                            echo "
                                                <option value='{$datab['b_id']}'>{$databc}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>ประเภท</b>
                                </p>
                                <select class="form-control show-tick" name="t_id">
                                    <?php
                                        $datat = $typeObj->getType();
                                        foreach($datat as $type){
                                            echo "
                                                <option value='{$type['t_id']}'>{$type['t_name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>ลักษณะงาน</b>
                                </p>
                                <select class="form-control show-tick" name="n_id">
                                    <?php
                                        $datan = $natureObj->getNature();
                                        foreach($datan as $nature){
                                            echo "
                                                <option value='{$nature['n_id']}'>{$nature['n_name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>รายละเอียด</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="r_remark" rows="3" name="r_remark" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary waves-effect">บันทึก</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
</body>

</html>