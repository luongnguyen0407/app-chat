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
    public function returnArray($res, $field = '')
    {
        if (empty($res)) return;
        $arr = array();
        if (empty($field)) {
            while ($row = mysqli_fetch_array($res)) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            while ($row = mysqli_fetch_array($res)) {
                $arr[] = $row[$field];
            }
            return $arr;
        }
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
}
