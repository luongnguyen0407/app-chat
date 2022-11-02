<?php
class DepartmentModal extends DB
{
    public function getDepartment()
    {
        $sql = "SELECT * FROM `tb_phongban`";
        $res = $this->link->query($sql);
        // return $idProduct;
        return $res;
    }
}
