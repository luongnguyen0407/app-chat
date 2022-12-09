<?php
class Holiday extends Controller
{
    use LoopData;
    public $holidayModel;
    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->holidayModel = $this->callModel('HolidayModel');
    }

    public function Show()
    {
        # code...
        $this->callView('Master', [
            'Page' => 'HolidayPage',
            // 'department' => $this->returnArray($this->departmentModel->getDepartment())
        ]);
    }
    public function createHoliday()
    {
        # code...
        $arrData = [
            "date",
            "name_holiday",
        ];
        $error = $this->LoopCheckError($arrData, $_POST);
        if (empty($error)) {
            $dateHoliday =  $_POST['date'];
            $nameHoliday = $_POST['name_holiday'];
            $kq = $this->holidayModel->newHoliday($dateHoliday, $nameHoliday);
            if ($kq) {
                header('location: ../Holiday');
            } else {
                $error['date'] = 'Lỗi Server';
            }
        }
        $this->callView('Master', [
            'Page' => 'HolidayPage',
            'error' => $error,
            'old_value' => $_POST
        ]);
    }

    public function deleteHoliday()
    {
        if (empty($_POST['id'])) return;
        $res = $this->holidayModel->deleteHoliday($_POST['id']);
        if ($res) {
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }
}
