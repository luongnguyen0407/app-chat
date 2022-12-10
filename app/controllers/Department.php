<?php
class Department extends Controller
{
    use LoopData;
    public $departmentModel;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->departmentModel = $this->callModel('DepartmentModel');
    }

    public function Show()
    {
        # code...
        $this->callView('Master', [
            'Page' => 'DepartmentPage',
            // 'department' => $this->returnArray($this->departmentModel->getDepartment())
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
            $res = $this->departmentModel->findData($upDepart);
            if (mysqli_num_rows($res) == 0) {
                $kq = $this->departmentModel->newDepartment($upDepart, ucwords($_POST['namePb']));
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
            // 'department' => $this->returnArray($this->departmentModel->getDepartment()),
            'error' => $error,
            'old_value' => $_POST
        ]);
    }

    public function deleteDepartment()
    {
        if (empty($_POST['id'])) return;
        $res = $this->departmentModel->deleteData($_POST['id']);
        if ($res) {
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }
}
