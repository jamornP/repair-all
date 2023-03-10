<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Repair extends DbRepair {
    public function getRepairByYear($year) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id

            WHERE
                r.year_term ='".$year."'
            ORDER BY
                r.s_id,r.date_add
            DESC
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getRepairByYearId($year,$id) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id

            WHERE
                r.year_term ='".$year."' AND
                r.r_id = '".$id."'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getRepairByYearStatus($year) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id

            WHERE
                r.year_term ='".$year."' AND
                r.s_id = 1
            ORDER BY
                r.s_id,r.date_add
            DESC
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getRowsRepairByYear($year) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id

            WHERE
                r.year_term ='{$year}'
            ORDER BY
                r.s_id,r.date_add
            DESC
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getRowsRepairByType($year,$t_id) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id
            WHERE
                r.year_term ='{$year}' AND r.t_id = '{$t_id}'
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getRowsRepairByYearStatus($year,$s_id) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id
            WHERE
                r.year_term ='{$year}' AND r.s_id = '{$s_id}'
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getRowsStatusAllByYear($year) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id
            WHERE
                r.year_term ='{$year}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getRowsStatusNoSuccessByYear($year) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id
            WHERE
                r.year_term ='{$year}' AND (r.s_id < 8)
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getRowsRepairByTypeStatus($year,$t_id,$s_id) {
        $sql = "
            SELECT 
                r.*,d.d_name,b.b_name,t.t_name,n.n_name,s.s_name
            FROM
                tb_e_repair as r
                LEFT JOIN tb_department as d ON d.d_id = r.d_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.t_id = r.t_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                LEFT JOIN tb_e_status as s ON s.s_id = r.s_id
            WHERE
                r.year_term ='{$year}' AND r.t_id = '{$t_id}' AND r.s_id = '{$s_id}'
            
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function addRepair($data) {
          $sql = "
            INSERT INTO tb_e_repair (     
                year_term, 
                date_add, 
                fullname, 
                d_id, 
                tel, 
                room,
                floor, 
                b_id, 
                t_id, 
                r_remark, 
                s_id, 
                n_id
            ) VALUES (
                :year_term, 
                :date_add, 
                :fullname, 
                :d_id, 
                :tel, 
                :room,
                :floor, 
                :b_id, 
                :t_id, 
                :r_remark, 
                :s_id, 
                :n_id
            )    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function updateRepairStatus($data) {
        $sql = "
        UPDATE 
            tb_e_repair 
        SET 
            s_id=:s_id 
        WHERE 
            r_id=:r_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
  
    // $sql = "
    //     INSERT INTO tb_e_repair (
             
    //         year_term, 
    //         date_add, 
    //         fullname, 
    //         d_id, 
    //         tel, 
    //         room, 
    //         b_id, 
    //         t_id, 
    //         r_remark, 
    //         s_id, 
    //         n_id
    //     ) VALUES (
            
    //         '".$data['year_term']."', 
    //         '".$data['date_add']."', 
    //         '".$data['fullname']."', 
    //         '".$data['d_id']."', 
    //         '".$data['tel']."', 
    //         '".$data['room']."', 
    //         '".$data['b_id']."', 
    //         '".$data['t_id']."', 
    //         '".$data['r_remark']."', 
    //         '".$data['s_id']."', 
    //         '".$data['n_id']."'
    //     )
         
    //     ";
}

?>