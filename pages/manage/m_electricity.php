<?php
session_start();
if($_SESSION['st_status']<>"staff" AND $_SESSION['st_status']<>"administrator"){
    header("location: /m/pages/auth");
    exit;
}
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
    <?php
        $all = $repairObj->getRowsStatusAllByYear($_SESSION['year']);
        $danger = $repairObj->getRowsStatusNoSuccessByYear($_SESSION['year']);
        $success = $repairObj->getRowsRepairByYearStatus($_SESSION['year'],8);
        $wait = $repairObj->getRowsRepairByYearStatus($_SESSION['year'],9);
        $company = $repairObj->getRowsRepairByYearStatus($_SESSION['year'],10);
    ?>
    <section class="content">
        <div class="container-fluid">
           
            <!-- Widgets -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">งานที่เรียบร้อย</div>
                            <div class="number"><?php echo $success;?></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">งานค้าง</div>
                            <div class="number"><?php echo $danger;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">schedule</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">งานรออะไหล่</div>
                            <div class="number"><?php echo $wait;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">งานจ้างเหมา</div>
                            <div class="number"><?php echo $company;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">รายการแจ้งซ่อมทั้งหมด</div>
                            <div class="number"><?php echo $all;?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_GET['id'])){
                ?>
                <!-- มี ID ------------------------------------------------------------- -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ใบงาน
                                </h2>
                                <div class="header-dropdown m-r--5">
                                
                                <!-- <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add_circle_outline</i>
                                        <span>แจ้งซ่อม</span></button> -->
                                    <!-- <a href="" class="btn btn-danger fs-16 text-white" >
                                        <i class="material-icons text-white">call</i> แจ้งซ่อม
                                    </a> -->
                                </div>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่แจ้ง</th>
                                            <th width="34%" scope="col">รายละเอียด</th>
                                            <th width="8%" scope="col">ห้อง</th>
                                            <th width="3%" scope="col">ชั้น</th>
                                            <th width="12%" scope="col">อาคาร</th>
                                            <th width="8%" scope="col">ประเถท</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="15%" scope="col">สถานะ</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $r_id =to($_GET['id']);
                                            $data = $repairObj->getRepairByYearId(yearterm(date("Y-m-d")),to($_GET['id']));
                                            print_r($datar);
                                            $i=0;
                                            
                                                $i++;
                                                $date_add = datethai($data['date_add']);
                                                
                                                $datefull = datethai_time($data['date_add']);
                                                $s = "";
                                                $dataSt1 = $datastatusObj->getDsByRid($r_id);
                                                // print_r($dataSt1);
                                                // foreach($dataSt1 as $c){
                                                //     $ds['s_id'] = $c['s_id'];
                                                //     $ds['s_name'] = $c['s_name'];
                                                //     $das = statusRepair($ds);
                                                //     $s = $s." ".$das['bt'];
                                                
                                                // }
                                                $s=btStatus($dataSt1);
                                                echo "
                                                    <tr>
                                                        <th scope='row'>{$i}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$data['r_remark']}</td>
                                                        <td class='fs-12'>{$data['room']}</td>
                                                        <td class='fs-12'>{$data['floor']}</td>
                                                        <td class='fs-10'>{$data['b_name']}</td>
                                                        <td class='fs-12'>{$data['t_name']}</td>
                                                        <td class='fs-12'>{$data['n_name']}</td>
                                                        <td class='fs-12'>{$data['fullname']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$data['s_name']}</td>
                                                    
                                                    </tr>
                                                ";
                                        
                                        ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ขั้นตอนการดำเนินงาน
                                </h2>
                                <div class="header-dropdown m-r--5">
                                
                                <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add_circle_outline</i>
                                        <span>เพิ่ม</span></span></button>
                                    <!-- <a href="" class="btn btn-danger fs-16 text-white" >
                                        <i class="material-icons text-white">call</i> แจ้งซ่อม
                                    </a> -->
                                </div>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่</th>
                                            <th width="50%" scope="col">รายละเอียด</th>
                                            <th width="" scope="col">ระยะเวลา</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                            <th width="" scope="col">ผู้บันทึก</th>
                                            <th width="" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $dataSt = $datastatusObj->getDsByRid($r_id);
                                            // print_r($dataSt);
                                            foreach($dataSt as $row){
                                                $date = datethai_time($row['date_update']);
                                                $ds2['s_id'] = $row['s_id'];
                                                $ds2['s_name'] = $row['s_name'];
                                                $das2 = statusRepair($ds2);
                                                ?>
                                                    <tr>
                                                        <th scope='row'><?php echo $row['ds_num'];?></th>
                                                        <td class='fs-10 text-center'><?php echo $date;?></td>
                                                        <td><?php echo $row['ds_remark'];?></td>
                                                        <td class=''><?php echo $row['ds_count_time'];?></td>
                                                        <td class=''><?php echo $das2['bt'];?> <?php echo $row['s_name'];?></td>
                                                        <td class=''><i class='material-icons btn btn-xs'>person</i> <?php echo $row['name_TH'];?></td>
                                                        <td class=' align-justify'>
                                                            <button class="btn btn-xs btn-warning" onclick="myFunction(<?php echo $row['ds_id'];?>,'<?php echo $row['ds_remark'];?>')"><i class="material-icons fs-12">settings</i></button>
                                                        </td>
                                                    </tr>
                                                ";
                                                <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                ?>
                <!-- ไม่มี ID แสดงทั้งหมด -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    รายการแจ้งซ่อมทั้งหมด
                                </h2>
                                <div class="header-dropdown m-r--5">
                            
                                <!-- <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add_circle_outline</i>
                                        <span>แจ้งซ่อม</span></button> -->
                                    <!-- <a href="" class="btn btn-danger fs-16 text-white" >
                                        <i class="material-icons text-white">call</i> แจ้งซ่อม
                                    </a> -->
                                </div>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th width="2%" scope="col">#</th>
                                                <th width="6%" scope="col">วันที่แจ้ง</th>
                                                <th width="34%" scope="col">รายละเอียด</th>
                                                <th width="8%" scope="col">ห้อง</th>
                                                <th width="3%" scope="col">ชั้น</th>
                                                <th width="12%" scope="col">อาคาร</th>
                                                <th width="8%" scope="col">ประเถท</th>
                                                <th width="8%" scope="col">ลักษณะงาน</th>
                                                <th width="10%" scope="col">ผู้แจ้ง</th>
                                                <th width="10%" scope="col">สถานะ</th>
                                                <th width="3%" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $year_term = yearterm(date('Y-m-d'));
                                                $datar = $repairObj->getRepairByYear($year_term);
                                                $i = 0;
                                                foreach($datar as $data){
                                                    $i++;
                                                    $date_add = datethai($data['date_add']);
                                                    $datefull = datethai_time($data['date_add']);
                                                    $dataSt1 = $datastatusObj->getDsByRid($r_id);
                                                    $ds['s_id'] = $data['s_id'];
                                                    $ds['s_name'] = $data['s_name'];
                                                    $das = statusRepair($ds);
                                                    $s = $das['bt'];
                                                    $r_idl = go($data['r_id']);
                                                echo "
                                                    <tr>
                                                        <th scope='row'>{$i}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$data['r_remark']}</td>
                                                        <td class='fs-12'>{$data['room']}</td>
                                                        <td class='fs-12'>{$data['floor']}</td>
                                                        <td class='fs-10'>{$data['b_name']}</td>
                                                        <td class='fs-12'>{$data['t_name']}</td>
                                                        <td class='fs-12'>{$data['n_name']}</td>
                                                        <td class='fs-12'>{$data['fullname']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$data['s_name']}</td>
                                                        <td class=' align-justify'>
                                                            <a href='/m/pages/manage/m_electricity.php?id={$r_idl}'>
                                                                <i class='material-icons'>settings</i>
                                                            </a>
                                                        </td>
                                                    
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
                <!-- #END# Exportable Table -->

                <?php 
                }
            ?>
        </div>
    </section>
    <?php
        if(isset($_GET['id'])){
            ?>
            <!-- defaultModal -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php
                            $status = to($_GET['id']);
                            ?>
                            <h4 class="modal-title" id="defaultModalLabel">ข้อมูลการดำเนินงาน <?php echo $status;?></h4>
                        </div>
                        <form id="add" action="m_save.php" method="post">
                            <div class="modal-body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p>
                                            <b>สถานะการดำเนินงาน</b>
                                        </p>
                                        <select class="form-control show-tick" name="s_id">
                                            <?php
                                                $s_id = $repairObj->getRepairByYearId($year_term,$r_id);
                                                $datast2 = $statusObj->getStatusManage($s_id['s_id']);
                                                foreach($datast2 as $st){
                                                    echo "
                                                        <option value='{$st['s_id']}'>{$st['s_name']}</option>
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
                                                <textarea class="form-control" id="ds_remark" rows="3" name="ds_remark" ></textarea>
                                                <input type="hidden" class="form-control" id="r_id" value="<?php echo to($_GET['id']);?>" name="r_id" required readonly>
                                                <input type="hidden" class="form-control" id="menu" value="electricity" name="menu" required readonly>
                                                <input type="hidden" class="form-control" id="action" value="add" name="action" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn-primary waves-effect" >บันทึก</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <?php
        }
    ?>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="editModalLabel">ข้อมูลการดำเนินงาน แก้ไข </h4>
                </div>
                <form id="add" action="m_save.php" method="post">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>รายละเอียด</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="eds_remark" rows="3" name="ds_remark" ></textarea>
                                        <input type="hidden" class="form-control" id="st_id" value="<?php echo $_SESSION['st_id'];?>" name="st_id" required readonly>
                                        <input type="hidden" class="form-control" id="r_id" value="<?php echo to($_GET['id']);?>" name="r_id" required readonly>
                                        <input type="hidden" class="form-control" id="ds_id"  name="ds_id" required readonly>
                                        <input type="hidden" class="form-control" id="menu" value="electricity" name="menu" required readonly>
                                        <input type="hidden" class="form-control" id="action" value="edit" name="action" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary waves-effect" >บันทึก</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>


 


    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/component/script-js.php";?>
    <script>
        $('#defaultModal').on('shown.bs.modal', function () {
            $('#ds_remark').focus();
        });
    </script>
    <script>
        function myFunction(id,re) {
            $('#editModal').modal('show');
            // document.getElementById("demo").style.color = "red";
            var ds =  document.getElementById("ds_id");
            var remark = document.getElementById("eds_remark");
            ds.value = id;
            remark.value = re;
            $('#ds_remark').focus();
        }
    </script>

</body>

</html>