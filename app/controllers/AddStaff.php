<?php
class AddStaff extends Controller
{
    use LoopData;
    public $positionModal;
    public $staffModal;
    function __construct()
    {
        //modal
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
        $this->staffModal = $this->callModal('StaffModal');
    }
    function Show()
    {

        $this->callView('Master', [
            'Page' => 'AddStaffPage',
            'Position' => $this->returnArray($this->positionModal->getPosition()),
            'Department' => $this->returnArray($this->departmentModal->getDepartment()),
        ]);
    }
    function Add()
    {
        //^([04]){2}([0-9]{10})$ cmnd

        $arrData = [
            "name",
            "phone",
            "can_cuoc",
            "can_cuoc_date",
            "gender",
            "department",
            "position",
            "sinh_nhat",
            "thanh_pho",
            "huyen",
            "xa",
            "salary",
            "trinh_do",
            "hop_dong_id",
            "date_start",
            "date_end",
        ];
        //check value empty
        $error = $this->LoopCheckError($arrData, $_POST);
        $dataOld = $_POST;
        $today = date("Y-m-d");
        $nowYear = date("Y");
        $file = $_FILES['file_avatar'];
        // if (!empty($file)) PrintDisplay::printFix($dataOld);

        //check img
        $imgUp =  $this->ValidateImg($file);
        if (!$imgUp) {
            $error["file_avatar"] = 'Ảnh không đúng định dạng hoặc quá lớn';
        } else {
            $dataOld['img'] = $imgUp;
        }

        //check date birthday
        if (!empty($dataOld['sinh_nhat'])) {
            $date = DateTime::createFromFormat("Y-m-d", $dataOld['sinh_nhat']);
            $yearSN = $date->format("Y");
            if ($nowYear - $yearSN <= 18) $error['sinh_nhat'] = 'Invalid value';
        }
        if ($dataOld['can_cuoc_date'] >= $today) $error['can_cuoc_date'] = 'Invalid value';
        if ($dataOld['date_end'] <= $today) $error['date_end'] = 'Invalid value';
        if ($dataOld['date_start'] >= $dataOld['date_end']) $error['date_start'] = 'Invalid value';
        if (empty($error)) {
            $kq = $this->staffModal->createNewStaff($dataOld);
            if ($kq) {
                $this->callView('Master', [
                    'Page' => 'AddStaffPage',
                    'Position' => $this->returnArray($this->positionModal->getPosition()),
                    'Department' => $this->returnArray($this->departmentModal->getDepartment()),
                    'status' => true,
                    'error' => $error,
                ]);
                move_uploaded_file($file['tmp_name'], './public/img/upload' . $imgUp);
            }
        } else {
            $this->callView('Master', [
                'Page' => 'AddStaffPage',
                'Position' => $this->returnArray($this->positionModal->getPosition()),
                'Department' => $this->returnArray($this->departmentModal->getDepartment()),
                'error' => $error,
                'old_value' => $dataOld
            ]);
        }
    }
}