<?php
class StaffModal extends DB
{
    public function createNewStaff($data)
    {
        $address = $data['thanh_pho'] . "," . $data['huyen'] . "," . $data['xa'];
        $sql = "INSERT INTO `tb_nhanvien`(`ho_ten`, `gioi_tinh`, `dia_chi`, `so_dien_thoai`, `ngay_sinh`, `can_cuoc`, `ngay_cap`, `hinh_anh`, `maCV`, `maPB`, `maTD`) 
        VALUES ('" . $data['name'] . "','" . $data['gender'] . "','" .
            $address . "','" . $data['phone'] . "','" . $data['sinh_nhat'] . "','" .
            $data['can_cuoc'] . "','" . $data['can_cuoc_date'] . "','" . $data['img'] . "','" .
            $data['position'] . "','" . $data['department'] . "','" . $data['trinh_do'] . "')";
        $res = $this->link->query($sql);
        if ($res) {
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
        } else {
            return false;
        }
    }

    public function getStaffExcel()
    {
        $sql = "SELECT tb_nhanvien.ho_ten, tb_nhanvien.dia_chi,tb_nhanvien.ngay_sinh,tb_nhanvien.so_dien_thoai,tb_nhanvien.can_cuoc,tb_hopdong.so_hop_dong, tb_hopdong.ngay_bat_dau, tb_hopdong.ngay_ket_thuc, tb_phongban.ten_phong FROM tb_hopdong INNER JOIN tb_nhanvien ON tb_hopdong.maNV=tb_nhanvien.maNV INNER JOIN tb_phongban ON tb_nhanvien.maPB=tb_phongban.maPB";
        $kq = $this->link->query($sql);
        if ($kq) return $kq;
    }
}
