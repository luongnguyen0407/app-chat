<?php
class HolidayModel extends DB
{
    use LoopData;
    public function getHoliday($date = false)
    {
        if (empty($date)) {
            $sql = "SELECT * FROM `tb_ngaynghi` WHERE 1";
        } else {
            $sql = "SELECT COUNT(maNN) as holiday FROM `tb_ngaynghi` WHERE YEAR(ngay_nghi) = '" . $date['year'] . "' AND MONTH(ngay_nghi) = '" . $date['month'] . "';";
        }
        $res = $this->link->query($sql);
        return $res;
    }
    public function newHoliday($date, $name)
    {
        $name = mysqli_real_escape_string($this->link, $name);
        $sql = "INSERT INTO `tb_ngaynghi`(`ngay_nghi`, `ten_ngay_nghi`) VALUES ('$date','$name')";
        $res = $this->link->query($sql);
        if ($res)
            return true;
        return false;
    }
    public function deleteHoliday($idHoliday)
    {
        $sql = "DELETE FROM `tb_ngaynghi` WHERE maNN = '$idHoliday'";
        $res = $this->link->query($sql);
        return $res;
    }

    public function updateHoliday($id, $date, $name)
    {
        $sql = "UPDATE `tb_ngaynghi` SET `ngay_nghi`='$date',`ten_ngay_nghi`='$name' WHERE maNN = '$id'";
        $res = $this->link->query($sql);
        return $res;
    }
}
