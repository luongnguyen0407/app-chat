<?php
class DashBoard extends Controller
{

    protected $manageModel;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->manageModel = $this->callModel('ManageModel');
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'DashBoardPage',
            'Card' => $this->manageModel->totalCard()
        ]);
    }
}
