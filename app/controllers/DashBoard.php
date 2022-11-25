<?php
class DashBoard extends Controller
{

    protected $manageModal;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->manageModal = $this->callModal('ManageModal');
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'DashBoardPage',
            'Card' => $this->manageModal->totalCard()
        ]);
    }
}
