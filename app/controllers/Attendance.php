<?php
class Attendance extends Controller
{
    use HandleMail;
    use LoopData;
    public $staffModal;
    public $accModal;
    public $attendanceModal;
    public $user;
    function __construct()
    {
        if (!$this->checkUser()) {
            header('location: ./Auth');
        };
        $this->user = $_SESSION['user'];
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
        $this->attendanceModal->getAttend($this->user['id']);
    }
    public function getTotalWork()
    {
        # code...
        $this->attendanceModal->getTotal($this->user['id']);
    }
    public function addAttendance()
    {
        # code...
        $currentHours = date('H');
        $alowHours = [8, 12, 13, 16, 15];
        echo $currentHours;
        if (in_array($currentHours, $alowHours)) {
            switch ($currentHours) {
                case 8:
                    # code...
                    $this->handleCheckIn('SANG');
                    break;
                case 15:
                    # code...
                    $this->handleCheckIn('CHIEU');
                    break;
                case 12:
                    # code...
                    $this->handleCheckOut('SANG');
                    break;
                case 16:
                    # code...
                    $this->handleCheckOut('CHIEU');
                    break;
                default:
                    # code...
                    break;
            }
        } else {
            $error = 'Bây giờ không trong giờ điểm danh';
        }

        // $where = ""
        die;
    }
    private function handleCheckIn($time)
    {
        $where = "maNV = '" . $this->user['id'] . "' AND `maCa` = '" . $time . "' AND ";
        $res = $this->attendanceModal->findData($where);
        $res = !empty($res) ? $res->fetch_assoc() : '';
        PrintDisplay::printFix($res);
    }
    private function handleCheckOut()
    {
        echo 'ok';
    }
}
