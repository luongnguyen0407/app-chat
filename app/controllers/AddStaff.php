<?php
class AddStaff extends Controller
{
    use LoopData;
    public $positionModal;
    private $resPo;
    private $resDep;
    function __construct()
    {
        //modal
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
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
        // PrintDisplay::printFix($error);
        if (empty($error)) {
            $this->callView('Master', [
                'Page' => 'AddStaffPage',
                'Position' => $this->returnArray($this->resPo),
                'Department' => $this->returnArray($this->resDep),
                'status' => 'done',
                'old_value' => $dataOld
            ]);
        } else {
            $this->callView('Master', [
                'Page' => 'AddStaffPage',
                'Position' => $this->returnArray($this->resPo),
                'Department' => $this->returnArray($this->resDep),
                'status' => 'false',
                'error' => $error
            ]);
        }
    }
}
