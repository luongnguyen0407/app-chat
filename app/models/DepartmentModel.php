<?php
class DepartmentModel extends DB
{
    public function getDepartment()
    {
        $sql = "SELECT * FROM `tb_phongban`";
        $res = $this->link->query($sql);
        // return $idProduct;
        return $res;
    }
    public function getDepartmentWhere($id)
    {
        $sql = "SELECT * FROM `tb_phongban` WHERE maPB = '$id'";
        $res = $this->link->query($sql);
        return $res;
    }
    public function findData($id)
    {
        $sql = "SELECT * FROM `tb_phongban` WHERE maPb = '$id'";
        $res = $this->link->query($sql);
        if (mysqli_num_rows($res)) {
            return true;
        }
        return false;
    }
    public function newDepartment($idDepart, $nameDepart)
    {
        $sql = "INSERT INTO `tb_phongban`(`maPB`, `ten_phong`) VALUES ('$idDepart','$nameDepart')";
        $res = $this->link->query($sql);
        return $res;
    }

    public function deleteData($idDepart)
    {
        $sql = "DELETE FROM `tb_phongban` WHERE maPb = '$idDepart'";
        $res = $this->link->query($sql);
        return $res;
    }
    public function updateDepartment($idOld, $idNew, $nameNew)
    {
        $nameNew = mysqli_real_escape_string($this->link, $nameNew);
        $idNew = mysqli_real_escape_string($this->link, $idNew);
        $idOld = mysqli_real_escape_string($this->link, $idOld);
        $sql = "UPDATE `tb_phongban` SET `maPB`='" . $idNew . "',`ten_phong`='" . $nameNew . "' WHERE maPB = '$idOld'";
        $res = $this->link->query($sql);
        return $res;
    }
}
