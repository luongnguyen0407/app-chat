<?php
class Attendance extends Controller
{
    use HandleMail;
    use LoopData;
    public $staffModal;
    public $accModal;
    public $attendanceModal;

    function __construct()
    {
        if (!$this->checkUser()) {
            header('location: ./Auth');
        };
        $this->userModal = $this->callModal('UserModal');
        $this->attendanceModal = $this->callModal('AttendanceModal');
    }
    function Show()
    {
        $this->callView('MasterUser', [
            'Page' => 'AttendancePage',
        ]);
    }

    function getCalendarAttendance()
    {
        $user = $_SESSION['user'];
        $this->attendanceModal->getAttend($user['id']);
    }
}
