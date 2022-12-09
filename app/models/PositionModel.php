<?php
class PositionModel extends DB
{
    public function getPosition()
    {
        $sql = "SELECT * FROM `tb_chucvu`";
        $res = $this->link->query($sql);
        // return $idProduct;
        # code...
        return $res;
    }
}
