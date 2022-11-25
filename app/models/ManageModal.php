<?php
class ManageModal extends DB
{
    use LoopData;
    public function totalCard()
    {
        $currentDate = date("Y-m-d");
        $sql = "SELECT ( SELECT COUNT(tb_nhanvien.maNV) FROM tb_nhanvien ) AS total_nv, ( SELECT COUNT(DISTINCT tb_bangcong.maNV) FROM tb_bangcong WHERE ngay_cham = $currentDate ) AS att, (SELECT COUNT(tb_phongban.maPB) FROM tb_phongban ) AS pb FROM dual;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            return $arr;
        }
        return false;
    }
}
