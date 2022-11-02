<?php
class StaffModal extends DB
{
    public function createNewStaff($data)
    {
        $data['img'] = 'osadkkfas';
        $address = $data['thanh_pho'] . "," . $data['huyen'] . "," . $data['xa'];
        $sql = "INSERT INTO `tb_nhanvien`(`ho_ten`, `gioi_tinh`, `dia_chi`, `so_dien_thoai`, `ngay_sinh`, `can_cuoc`, `ngay_cap`, `hinh_anh`, `maCV`, `maPB`, `maTD`) 
        VALUES ('" . $data['name'] . "','" . $data['gender'] . "','" .
            $address . "','" . $data['phone'] . "','" . $data['sinh_nhat'] . "','" .
            $data['can_cuoc'] . "','" . $data['can_cuoc_date'] . "','" . $data['img'] . "','" .
            $data['position'] . "','" . $data['department'] . "','" . $data['trinh_do'] . "')";
        $res = $this->link->query($sql);
        // return $idProduct;
        # code...
        if ($res) {
            return 'ok';
        } else {
            return $sql;
        }
    }
}
