<?php
class AccModel extends DB
{
    use LoopData;
    public function findData($where, $data, $get = '')
    {
        try {
            //code...
            $sql = empty($get) ? "SELECT `khoi_phuc` FROM `tb_taikhoan` WHERE $where = $data" : "SELECT $get FROM `tb_taikhoan` INNER JOIN `tb_nhanvien` ON tb_taikhoan.maNV = tb_nhanvien.maNV WHERE $where = $data";
            $kq =  $this->link->query($sql);
            return $kq;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
    public function updateData($what, $data, $uid)
    {
        $sql = "UPDATE `tb_taikhoan` SET `$what`='$data' WHERE tai_khoan = $uid";
        $kq =  $this->link->query($sql);
        if ($kq) return true;
        return false;
    }
    public function updatePass($uid, $passNew, $passOld)
    {
        $old = $this->findData('tb_taikhoan.maNV', $uid, 'mat_khau, tai_khoan');
        if ($old) {
            $oldPass = $old->fetch_assoc();
            $checkPass =  password_verify($passOld, $oldPass["mat_khau"]);
            if (!$checkPass) {
                echo 'error';
            } else {
                $newPass = password_hash($passNew, PASSWORD_DEFAULT);
                $res =  $this->updateData('mat_khau', $newPass,  $oldPass["tai_khoan"]);
                if ($res) {
                    echo true;
                }
            }
        }
    }
}
