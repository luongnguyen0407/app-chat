<?php
class User extends Controller
{
    use LoopData;
    public $staffModel;
    public $positionModel;
    public $departmentModel;

    function __construct()
    {
        if (!$this->checkUser()) {
            header('location: ./Auth');
        }
        $this->staffModel = $this->callModel('StaffModel');
        $this->positionModel = $this->callModel('PositionModel');
        $this->departmentModel = $this->callModel('DepartmentModel');
    }

    function Show()
    {
        $user = $_SESSION['user'];
        $res = $this->staffModel->findData('maNV', $user['id'], "*");
        $this->callView('MasterUser', [
            'Page' => 'UpdateProfile',
            'staff' => $res->fetch_assoc()
        ]);
    }
}
