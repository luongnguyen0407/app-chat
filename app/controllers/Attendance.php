<?php
class Attendance extends Controller
{
    use HandleMail;
    use LoopData;
    public $staffModal;
    public $accModal;

    function __construct()
    {
        $this->userModal = $this->callModal('UserModal');
        $this->staffModal = $this->callModal('StaffModal');
        $this->accModal = $this->callModal('AccModal');
    }

    function Show()
    {
        $this->callView('MasterUser', [
            'Page' => 'AttendancePage',
        ]);
    }
}
