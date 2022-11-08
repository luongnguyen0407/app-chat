<?php
class AttendanceModal extends DB
{
    use LoopData;
    public function getAttend($uid, $month)
    {
        if (!$uid || !$month) return;
        $sql = "SELECT gio_vao, gio_ra, ngay_cham FROM tb_bangcong WHERE MONTH(tb_bangcong.ngay_cham) = $month AND YEAR(tb_bangcong.ngay_cham) = 2022 AND tb_bangcong.maNV = $uid;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            echo json_encode($arr);
        }
    }
}
