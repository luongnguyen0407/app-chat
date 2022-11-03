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
}
