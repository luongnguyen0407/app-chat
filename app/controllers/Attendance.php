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
        $this->staffModal = $this->callModal('StaffModal');
    }
    function Show()
    {
        $this->callView('MasterUser', [
            'Page' => 'AttendancePage',
            'profile' => $this->staffModal->getDetailStaff($this->user['id'])
        ]);
    }

    function getCalendarAttendance()
    {
        $this->attendanceModal->getAttend($this->user['id']);
    }

    function handleUpdate()
    {
        $arr = ['id', 'timeStart', 'timeEnd'];
        $error = $this->LoopCheckError($arr, $_POST);
        if (!empty($error)) return;
        $this->attendanceModal->updateAttByAdmin($_POST['timeStart'], $_POST['timeEnd'], $_POST['id']);
    }

    function getCalendarByAdmin()
    {
        $id = $_POST['id'];
        if (empty($id)) return;
        $this->attendanceModal->getAttend($id);
    }
    function updateAttendanceByAdmin()
    {
        $arr = ['uid', 'timeStart', 'timeEnd', 'timeLine', 'day'];
        $error = $this->LoopCheckError($arr, $_POST);
        if (!empty($error)) return;
        $this->attendanceModal->addNewAttByAdmin($_POST);
    }
    function getCalendarByDay()
    {
        $id = $_POST['id'];
        $day = $_POST['day'];
        if (empty($id) || empty($day)) return;
        $this->attendanceModal->getAttendByDay($id, $day);
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
        $startAfternoon = 13;
        $alowTimeCheckIn = [8, 13];
        $endCheckOut = 16;
        $timeLine = $currentHours <  $startAfternoon ? 'SANG' : 'CHIEU';
        $where = "maNV = '" . $this->user['id'] . "' AND `maCa` = '" . $timeLine  . "' AND ";
        $res = $this->attendanceModal->findData($where);
        if (mysqli_num_rows($res) > 0) {
            $res = $res->fetch_assoc();
            if ($currentHours > $endCheckOut) {
                //17 is end time check out
                $this->callView('MasterUser', [
                    'Page' => 'AttendancePage',
                    'status' => 'Quá giờ check out',
                    'profile' => $this->staffModal->getDetailStaff($this->user['id'])
                ]);
                return;
            }
            $time = date('H', strtotime($res['gio_vao']));
            if ($currentHours - $time >= 1 && !$res['gio_ra']) { // alow check out after check in 1 hour
                $kq = $this->attendanceModal->updateAtt($timeLine, $this->user['id']);
                $status = 'Check out thành công';
            } else {
                $status = 'Quá sớm để check out';
            }
            $this->callView('MasterUser', [
                'Page' => 'AttendancePage',
                'status' => $status,
                'profile' => $this->staffModal->getDetailStaff($this->user['id'])
            ]);
        } else {
            if (in_array($currentHours, $alowTimeCheckIn)) {
                $kq = $this->attendanceModal->addNewAtt($timeLine, $this->user['id']);
                if ($kq) {
                    $status = 'Điểm danh thành công';
                } else {
                    $status = 'Error at 105';
                }
            } else {
                $status = 'Quá giờ Check in';
            }
            $this->callView('MasterUser', [
                'Page' => 'AttendancePage',
                'status' => $status,
                'profile' => $this->staffModal->getDetailStaff($this->user['id'])
            ]);
        }
    }
}
