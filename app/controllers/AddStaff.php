<?php
class AddStaff extends Controller
{
    use LoopData;
    public $positionModal;
    public $staffModal;
    private $resPo;
    private $resDep;
    function __construct()
    {
        //modal
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
        $this->staffModal = $this->callModal('StaffModal');
        $this->resPo =  $this->positionModal->getPosition();
        $this->resDep =  $this->departmentModal->getDepartment();
    }
    function Show()
    {

        $this->callView('Master', [
            'Page' => 'AddStaffPage',
            'Position' => $this->returnArray($this->resPo),
            'Department' => $this->returnArray($this->resDep),
            'error' => 'this loi'
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
        $error = $this->LoopCheckError($arrData, $_POST);
        $dataOld = $_POST;
        // $departmentId = $this->returnArray($this->resPo, 'maCV');
        // $departmentModal = $this->returnArray($this->resDep, 'maPB');
        $today = date("Y-m-d");
        $nowYear = date("Y");
        if (!empty($dataOld['sinh_nhat'])) {
            $date = DateTime::createFromFormat("Y-m-d", $dataOld['sinh_nhat']);
            $yearSN = $date->format("Y");
            if ($nowYear - $yearSN <= 18) $error['sinh_nhat'] = 'Invalid value';
        }
        if ($dataOld['can_cuoc_date'] >= $today) $error['can_cuoc_date'] = 'Invalid value';
        if ($dataOld['date_end'] <= $today) $error['date_end'] = 'Invalid value';
        if ($dataOld['date_start'] >= $dataOld['date_end']) $error['date_start'] = 'Invalid value';
        if (empty($error)) {
            PrintDisplay::printFix($dataOld);

            echo $this->staffModal->createNewStaff($dataOld);

            // $this->callView('Master', [
            //     'Page' => 'AddStaffPage',
            //     'Position' => $this->returnArray($this->resPo),
            //     'Department' => $this->returnArray($this->resDep),
            //     'status' => 'false',
            //     'error' => $error,
            // ]);
        } else {
            $this->callView('Master', [
                'Page' => 'AddStaffPage',
                'Position' => $this->returnArray($this->resPo),
                'Department' => $this->returnArray($this->resDep),
                'status' => 'false',
                'error' => $error,
                'old_value' => $dataOld
            ]);
        }
    }
}
