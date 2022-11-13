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
        $alowHours = [8, 12, 13, 16];
        if (in_array($currentHours, $alowHours)) {
            switch ($currentHours) {
                case 8:
                    # code...
                    $this->handleCheckIn('SANG');
                    break;
                case 13:
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
            $this->callView('MasterUser', [
                'Page' => 'AttendancePage',
                'status' => 'Bây giờ không trong giờ điểm danh',
                'profile' => $this->staffModal->getDetailStaff($this->user['id'])

            ]);
        }
    }
    private function handleCheckIn($time)
    {
        $where = "maNV = '" . $this->user['id'] . "' AND `maCa` = '" . $time . "' AND ";
        $res = $this->attendanceModal->findData($where);
        $res = !empty($res) ? $res->fetch_assoc() : '';
        if (empty($res)) {
            $kq = $this->attendanceModal->addNewAtt($time, $this->user['id']);
            if ($kq) {
                $this->callView('MasterUser', [
                    'Page' => 'AttendancePage',
                    'status' => 'Điểm danh thành công',
                    'profile' => $this->staffModal->getDetailStaff($this->user['id'])
                ]);
            }
        } else {
            $this->callView('MasterUser', [
                'Page' => 'AttendancePage',
                'status' => 'Bạn đã điểm danh rồi',
                'profile' => $this->staffModal->getDetailStaff($this->user['id'])
            ]);
        }
    }
    private function handleCheckOut($time)
    {
        $where = "maNV = '" . $this->user['id'] . "' AND `maCa` = '" . $time . "' AND ";
        $res = $this->attendanceModal->findData($where);
        $res = !empty($res) ? $res->fetch_assoc() : '';
        if (!empty($res) && empty($res['gio_ra'])) {
            // PrintDisplay::printFix($res);
            // die;
            $kq = $this->attendanceModal->updateAtt($time, $this->user['id']);
            if ($kq) {
                $this->callView('MasterUser', [
                    'Page' => 'AttendancePage',
                    'status' => 'Điểm danh thành công',
                    'profile' => $this->staffModal->getDetailStaff($this->user['id'])
                ]);
            }
        } else {
            $this->callView('MasterUser', [
                'Page' => 'AttendancePage',
                'status' => 'Bạn đã điểm danh rồi',
                'profile' => $this->staffModal->getDetailStaff($this->user['id'])
            ]);
        }
    }
}
