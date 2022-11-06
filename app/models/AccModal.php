<?php
class AccModal extends DB
{
    use LoopData;
    public function findData($where, $data, $get = '')
    {
        $sql = empty($get) ? "SELECT `khoi_phuc` FROM `tb_taikhoan` WHERE $where = $data" : "SELECT $get FROM `tb_taikhoan` WHERE $where = $data";
        $kq =  $this->link->query($sql);
        if ($kq) return $kq;
        return false;
    }
    public function updateData($what, $data, $uid)
    {
        $sql = "UPDATE `tb_taikhoan` SET `$what`='$data' WHERE tai_khoan = $uid";
        $kq =  $this->link->query($sql);
        if ($kq) return true;
        return false;
    }
}
