<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Menu extends DbRepair {
    public function getMenu() {
        $sql = "
            SELECT 
                *
            FROM
                tb_menu
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
    public function getMenuById($m_id) {
        $sql = "
            SELECT 
                *
            FROM
                tb_menu
            WHERE
                m_id =".$m_id
        ;
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function addMenu($data) {
        $sql = "
          INSERT INTO tb_menu (     
            m_link, 
            link, 
            m_icon, 
            m_name, 
            m_code
          ) VALUES (
            :m_link, 
            :link, 
            :m_icon, 
            :m_name, 
            :m_code
          )    
      ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);
      return $this->pdo->lastInsertId();
    }
    public function addMenuSt($data) {
        $sql = "
          INSERT INTO tb_st_menu (     
            st_id, 
            m_id
          ) VALUES (
            :st_id, 
            :m_id
          )    
      ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);
      return $this->pdo->lastInsertId();
    }
    public function getMenuByStId($st_id) {
        $sql = "
            SELECT 
                stm.*,m.m_name,m.m_code,m.m_icon,m.m_link
            FROM
                tb_st_menu as stm
                LEFT JOIN tb_menu as m ON m.m_id = stm.m_id
            WHERE
                stm.st_id ='".$st_id."'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}

?>