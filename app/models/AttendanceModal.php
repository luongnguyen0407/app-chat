<?php
class AttendanceModal extends DB
{
    use LoopData;
    public function getAttend($uid)
    {
        if (!$uid) return;
        $sql = "SELECT gio_vao, gio_ra, ngay_cham FROM tb_bangcong WHERE YEAR(tb_bangcong.ngay_cham) = 2022 AND tb_bangcong.maNV = $uid;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            echo json_encode($arr);
        }
    }
    public function getTotal($uid)
    {
        if (!$uid) return;
        $currentYear = date("Y");
        $currentMonth = date("m");
        try {
            $sql = "SELECT ( HOUR(gio_ra) - HOUR(gio_vao)) * 60 + MINUTE(gio_ra) - MINUTE(gio_vao) as totalMin FROM tb_bangcong WHERE tb_bangcong.maNV = $uid AND  gio_vao IS NOT NULL AND gio_ra IS NOT NULL AND YEAR(ngay_cham) = $currentYear AND MONTH(ngay_cham) = $currentMonth ;";
            $res = $this->link->query($sql);
            $arr = $this->returnArray($res);
            echo json_encode($arr);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function findData($where)
    {
        try {
            //code...
            $currentDate = date("Y-m-d");
            $sql = "SELECT * FROM `tb_bangcong` WHERE $where ngay_cham = '" . $currentDate . "'";
            echo $sql;
            $kq =  $this->link->query($sql);
            return $kq;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}
