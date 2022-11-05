<?php
class StaffModal extends DB
{
    use LoopData;
    public function createNewStaff($data)
    {
        $sql = "INSERT INTO `tb_nhanvien`(`ho_ten`, `gioi_tinh`, `dia_chi`, `so_dien_thoai`,`email`, `ngay_sinh`, `can_cuoc`, `hinh_anh`, `maCV`, `maPB`, `maTD`) 
        VALUES ('" . $data['name'] . "','" . $data['gender'] . "','" .
            $data['dia_chi'] . "','" . $data['phone'] . "','" . $data['email'] . "','" . $data['sinh_nhat'] . "','" .
            $data['can_cuoc'] . "','" . $data['img'] . "','" .
            $data['position'] . "','" . $data['department'] . "','" . $data['trinh_do'] . "')";
        try {
            //code...
            $this->link->query($sql);
            $id = $this->link->insert_id;
            $password = password_hash($data['can_cuoc'], PASSWORD_DEFAULT);
            //add hop dong
            $insertHD = "INSERT INTO `tb_hopdong`( `so_hop_dong`, `ngay_bat_dau`, `ngay_ket_thuc`, `luong_cung`, `chi_tiet`, `maNV`) 
            VALUES ('" . $data['hop_dong_id'] . "','" . $data['date_start'] . "','" . $data['date_end'] . "','" . $data['salary'] . "','null','" . $id . "')";
            //add acc
            $insertAcc = "INSERT INTO `tb_taikhoan`(`tai_khoan`, `mat_khau`, `chuc_vu`, `maNV`) 
            VALUES ('" . $data['can_cuoc'] . "','" . $password . "','0', '" . $id . "')";
            if ($this->link->query($insertHD) && $this->link->query($insertAcc)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            // throw $th;
            return false;
        }
    }

    public function getStaffExcel()
    {
        $sql = "SELECT tb_nhanvien.ho_ten, tb_nhanvien.dia_chi,tb_nhanvien.ngay_sinh,tb_nhanvien.so_dien_thoai,tb_nhanvien.can_cuoc, tb_nhanvien.hinh_anh,tb_hopdong.so_hop_dong, tb_hopdong.ngay_bat_dau, tb_hopdong.ngay_ket_thuc, tb_phongban.ten_phong FROM tb_hopdong INNER JOIN tb_nhanvien ON tb_hopdong.maNV=tb_nhanvien.maNV INNER JOIN tb_phongban ON tb_nhanvien.maPB=tb_phongban.maPB";
        $kq = $this->link->query($sql);
        if ($kq) return $kq;
    }
    public function getAllStaff()
    {
        $sql = "SELECT tb_nhanvien.ho_ten, tb_nhanvien.dia_chi,tb_nhanvien.ngay_sinh,tb_nhanvien.so_dien_thoai,tb_nhanvien.can_cuoc, tb_nhanvien.hinh_anh, tb_nhanvien.gioi_tinh,tb_hopdong.so_hop_dong, tb_hopdong.ngay_bat_dau, tb_hopdong.ngay_ket_thuc, tb_phongban.ten_phong FROM tb_hopdong INNER JOIN tb_nhanvien ON tb_hopdong.maNV=tb_nhanvien.maNV INNER JOIN tb_phongban ON tb_nhanvien.maPB=tb_phongban.maPB";
        $kq = $this->link->query($sql);
        if ($kq) return $kq;
    }
    public function addNewStaffExcel($data)
    {
        if (empty($data)) return;
        $fieldError = array();
        foreach ($data as $row) {
            // PrintDisplay::printFix($row);
            $checkValue = $this->ValidateDataExcel($row);
            if (is_array($checkValue)) {
                $res = $this->createNewStaff($checkValue);
                if (!$res) {
                    continue;
                }
            } else {
                $fieldError[] =  $row[0] . ':' . $checkValue;
                // continue;
            }
        }
        return $fieldError;
    }

    public function findData($name, $data)
    {
        $sql = "SELECT $name FROM `tb_nhanvien` WHERE $name = '" . $data . "'";
        $kq = $this->link->query($sql);
        if (mysqli_num_rows($kq)) {
            return true;
        } else {
            return false;
        }
    }
}
