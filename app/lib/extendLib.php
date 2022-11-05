<?php
class PrintDisplay
{
    static public function printError($data, $nameField)
    {

        if (!empty($data['error'][$nameField])) {
            echo $data['error'][$nameField];
        }
    }
    static public function printFix($data)
    {
        if (!empty($data)) {
            echo '<pre>';
            print_r($data);
            echo '<pre/>';
        }
    }
    static public function printValue($data, $nameField)
    {
        if (!empty($data['old_value'][$nameField])) {
            echo $data['old_value'][$nameField];
        }
    }
    static public function printShow($data, $nameField)
    {
        if (!empty($data[$nameField])) {
            echo $data[$nameField];
        }
    }
}
trait LoopData
{
    public function returnArray($res)
    {
        if (empty($res)) return;
        $arr = array();
        while ($row = mysqli_fetch_array($res)) {
            $arr[] = $row;
        }
        return $arr;
    }
    public function LoopCheckError($data, $dataForm)
    {
        if (empty($data)) return;
        $error = array();
        foreach ($data as &$field) {
            if (empty($dataForm[$field])) {
                $error[$field] = "This field is required";
            }
        }
        return $error;
    }

    public function ValidateImg($file)
    {
        if (empty($file)) return false;
        $alow_ext = ['jpg', "jpeg", 'gif', 'png', "svg", 'tiff', "bmp", 'tga', "raw", "jfif"];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_size = $file['size'];
        if (!in_array($ext, $alow_ext)) {
            return false;
        } else {
            $size = 10;
            $sizeFile = $file_size / 1024 / 1024;
            if ($sizeFile > $size) {
                return false;
            } else {
                $file_name =  strlen($file['name']) > 10 ? substr($file['name'], 0, 10) : $file['name'];
                $newFileName = $file_name . time() . "." . $ext;
                return $newFileName;
            }
        }
    }

    public function ValidateDataExcel($data)
    {
        if (empty($data)) return;

        $pb = ['MKT', 'IT', 'SEO'];
        $gender = ['NAM', 'NU'];
        $td = ['DH', 'CD', 'C3'];
        $rexPhone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        $rexCMND = "/^([04]){2}([0-9]{10})$/";

        // if()
        if (count($data) != 15) {
            return false;
        };
        if (!in_array($data[7], $pb) || !in_array($data[9], $gender) || !in_array($data[10], $td)) return false;
        if (!preg_match($rexPhone, $data[1]) || !preg_match($rexCMND, $data[2])) return false;
        if ($data[14] != 'photo-def.jpg') return false;

        // return true;
        $keyArray = [
            'name', 'phone', 'can_cuoc', 'can_cuoc_date', 'hop_dong_id', 'date_start', 'date_end', 'department', 'dia_chi', 'gender', 'trinh_do', 'salary', 'position', 'sinh_nhat', 'img'
        ];
        $coverArray = array_combine($keyArray, $data);
        return $coverArray;
        //    [0] => Tin Học 1
        //    [1] => 0325847556
        //    [2] => 0456683424
        //    [3] => 2022-11-01
        //    [4] => hd4352
        //    [5] => 2022-11-02
        //    [6] => 2022-11-30
        //    [7] => MKT
        //    [8] => Tỉnh Hà Tĩnh,Thị xã Hồng Lĩnh,Phường Trung Lương
        //    [9] => NAM
        //    [10] => DH
        //    [11] => 1200000
        //    [12] => TP
        //    [13] => 36819
        //    [14] => photo-def.jpg
    }
}
