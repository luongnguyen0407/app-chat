<?php
class AttendanceModel extends DB
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

    public function getAttendByDay($uid, $day)
    {
        if (!$uid || !$day) return;
        $sql = "SELECT * FROM tb_bangcong WHERE tb_bangcong.ngay_cham = '" . $day . "' AND tb_bangcong.maNV = $uid;";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            echo json_encode($arr);
        }
    }

    public function getTotal($uid, $type = false, $date = false)
    {
        if (!$uid) return;
        $currentYear = date("Y");
        $currentMonth = date("m");
        if (empty($date)) {
            $sql = "SELECT ( HOUR(gio_ra) - HOUR(gio_vao)) * 60 + MINUTE(gio_ra) - MINUTE(gio_vao) as totalMin FROM tb_bangcong WHERE tb_bangcong.maNV = $uid AND  gio_vao IS NOT NULL AND gio_ra IS NOT NULL AND YEAR(ngay_cham) = $currentYear AND MONTH(ngay_cham) = $currentMonth ;";
        } else {
            $sql = "SELECT ( HOUR(gio_ra) - HOUR(gio_vao)) * 60 + MINUTE(gio_ra) - MINUTE(gio_vao) as totalMin FROM tb_bangcong WHERE tb_bangcong.maNV = $uid AND  gio_vao IS NOT NULL AND gio_ra IS NOT NULL AND YEAR(ngay_cham) = " . $date['year'] . " AND MONTH(ngay_cham) = " . $date['month'] . " ;";
        }
        $res = $this->link->query($sql);
        if ($res) {
            $arr = $this->returnArray($res);
            if (empty($type)) {
                echo json_encode($arr);
            } else {
                return $arr;
            }
        } else {
            http_response_code(500);
        }
    }
    public function findData($where)
    {
        //code...
        $currentDate = date("Y-m-d");
        $sql = "SELECT * FROM `tb_bangcong` WHERE $where ngay_cham = '" . $currentDate . "'";
        $kq =  $this->link->query($sql);
        if ($kq) return $kq;
        return false;
    }
    public function addNewAtt($maCA, $maNV)
    {
        //code...
        $currentTime = date('H:i:s');
        $currentDate = date("Y-m-d");
        $sql = "INSERT INTO `tb_bangcong`(`gio_vao`, `gio_ra`, `ngay_cham`, `maCA`, `maNV`) 
            VALUES ('$currentTime', NULL,'$currentDate','$maCA','$maNV')";
        $res = $this->link->query($sql);
        if ($res) return true;
        return false;
    }
    public function addNewAttByAdmin($data)
    {
        $sql = "INSERT INTO `tb_bangcong`(`gio_vao`, `gio_ra`, `ngay_cham`, `maCA`, `maNV`) 
            VALUES ('" . $data['timeStart'] . "', '" . $data['timeEnd'] . "','" . $data['day'] . "','" . $data['timeLine'] . "','" . $data['uid'] . "')";

        $res = $this->link->query($sql);
        if ($res) {
            return http_response_code(200);
        }
        http_response_code(500);
    }

    public function updateAtt($maCA, $maNV)
    {
        $currentTime = date('H:i:s');
        $currentDate = date("Y-m-d");
        $sql = "UPDATE `tb_bangcong` SET `gio_ra`='$currentTime' WHERE ngay_cham = '" . $currentDate . "' AND maNV = '" . $maNV . "' AND maCA = '" . $maCA . "'";
        $res = $this->link->query($sql);
        if ($res) return true;
        return false;
    }
    public function updateAttByAdmin($timeStart, $timeEnd, $id)
    {
        $time_start = $timeStart == '00:00:00' ? 'NULL' : "'$timeStart'";
        $time_end = $timeEnd == '00:00:00' ? 'NULL' : "'$timeEnd'";
        $sql = "UPDATE `tb_bangcong` SET `gio_vao`= $time_start, `gio_ra`= $time_end WHERE  maBC = '" . $id . "'";
        $kq = $this->link->query($sql);
        if ($kq) {
            return http_response_code(200);
        }
        http_response_code(500);
    }
}
