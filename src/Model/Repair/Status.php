<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Status extends DbRepair {
    public function getStatus() {
        $sql = "
            SELECT 
                *
            FROM
                tb_e_status
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getStatusManage($s_id) {
        switch ($s_id) {
            case "9":
                $sql = "SELECT * FROM tb_e_status WHERE s_id > 4";
              break;
            case "10":
                $sql = "SELECT * FROM tb_e_status WHERE s_id > 4";
              break;
            default:
                $sql = "SELECT * FROM tb_e_status WHERE s_id > ".$s_id;
        }
        
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getStatusById($s_id) {
        $sql = "
            SELECT 
                *
            FROM
                tb_e_status
            WHERE
                s_id =".$s_id
        ;
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    
}

?>