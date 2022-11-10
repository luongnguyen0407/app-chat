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
        try {
            $sql = "SELECT time(gio_ra - gio_vao) as tong from tb_bangcong WHERE tb_bangcong.maNV = $uid AND  gio_vao IS NOT NULL AND gio_ra IS NOT NULL;";
            $res = $this->link->query($sql);
            $arr = $this->returnArray($res);
            echo json_encode($arr);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
