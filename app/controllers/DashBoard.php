<?php
class DashBoard extends Controller
{

    private $manageModel;
    private $staffModel;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->manageModel = $this->callModel('ManageModel');
        $this->staffModel = $this->callModel('StaffModel');
    }

    function Show()
    {
        $currenYear = date("Y");
        $currenMonth = date("m");
        $currenMonth = $currenMonth == 1 ? 12 : $currenMonth - 1;
        $this->callView('Master', [
            'Page' => 'DashBoardPage',
            'Card' => $this->manageModel->totalCard(),
            'Department' => $this->manageModel->getTotalStaffDep(),
            'staff' => $this->staffModel->getAllSalary($currenYear, $currenMonth),
        ]);
    }
}
