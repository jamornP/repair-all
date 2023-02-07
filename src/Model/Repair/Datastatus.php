<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Datastatus extends DbRepair {
    public function addDataStatus($data) {
        $sql = "
            INSERT INTO tb_e_datastatus ( 
                r_id, 
                s_id, 
                ds_remark, 
                ds_num, 
                date_update, 
                st_id,
                ds_count_time
            ) VALUES ( 
                :r_id, 
                :s_id, 
                :ds_remark,
                :ds_num, 
                :date_update, 
                :st_id,
                :ds_count_time
            );
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
        // return $sql;
    }
    public function updateDataStatus($data) {
        $sql = "
            UPDATE 
                tb_e_datastatus 
            SET
                ds_remark = :ds_remark ,
                st_id = :st_id 
            WHERE
                ds_id = :ds_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
        // return $sql;
    }
    public function getDsByRid($id) {
        $sql = "
            SELECT 
                ds.*,s.s_name as s_name,st.st_id,st.name_TH
            FROM 
                tb_e_datastatus as ds
                LEFT JOIN tb_e_status as s ON s.s_id = ds.s_id
                LEFT JOIN tb_staff as st ON st.st_id = ds.st_id
            WHERE 
                r_id='".$id."'
            ORDER BY
                ds_num
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getNumById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_e_datastatus
            WHERE 
                r_id='".$id."'
            ORDER BY
                ds_num
            DESC
            LIMIT 1
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    

}
?>