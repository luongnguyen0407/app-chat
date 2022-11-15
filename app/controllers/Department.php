<?php
class Department extends Controller
{
    use LoopData;
    public $departmentModal;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->departmentModal = $this->callModal('DepartmentModal');
    }

    public function Show()
    {
        # code...
        $this->callView('Master', [
            'Page' => 'DepartmentPage',
            'department' => $this->returnArray($this->departmentModal->getDepartment())
        ]);
    }
    public function createDepartment()
    {
        # code...
        $arrData = [
            "maPb",
            "namePb",
        ];
        $error = $this->LoopCheckError($arrData, $_POST);
        if (empty($error)) {
            $idDepart =  strlen($_POST['maPb']) > 5 ? substr($_POST['maPb'], 0, 5) : $_POST['maPb'];
            $upDepart = strtoupper($idDepart);
            $res = $this->departmentModal->findData($upDepart);
            if (!$res) {
                $kq = $this->departmentModal->newDepartment($upDepart, ucwords($_POST['namePb']));
                if ($kq) {
                    header('location: ../Department');
                } else {
                    $error['maPb'] = 'Lỗi Server';
                }
            } else {
                $error['maPb'] = 'Mã Phòng Ban Đã Tồn Tại';
            }
        }
        $this->callView('Master', [
            'Page' => 'DepartmentPage',
            'department' => $this->returnArray($this->departmentModal->getDepartment()),
            'error' => $error,
            'old_value' => $_POST
        ]);
    }

    public function deleteDepartment()
    {
        if (empty($_POST['id'])) return;
        $res = $this->departmentModal->deleteData($_POST['id']);
        if ($res) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }
}
