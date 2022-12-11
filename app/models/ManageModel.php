<?php
class ManageModel extends DB
{
    use LoopData;
    public function totalCard()
    {
        $currentDate = date("Y-m-d");
        $sql = "SELECT ( SELECT COUNT(tb_nhanvien.maNV) FROM tb_nhanvien ) AS total_nv, ( SELECT COUNT(DISTINCT tb_bangcong.maNV) FROM tb_bangcong WHERE ngay_cham = '$currentDate' ) AS att, (SELECT COUNT(tb_phongban.maPB) FROM tb_phongban ) AS pb FROM dual;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            return $arr;
        }
        return false;
    }
    public function getTotalStaffDep()
    {
        $sql = "SELECT tb_phongban.maPB,tb_phongban.ten_phong, COUNT(tb_nhanvien.maNV) as total FROM tb_phongban LEFT JOIN tb_nhanvien ON tb_phongban.maPB = tb_nhanvien.maPB GROUP BY tb_phongban.maPB;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            return $arr;
        }
        return false;
    }
}
