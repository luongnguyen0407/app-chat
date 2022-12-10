<?php
class Salary extends Controller
{
    private $attendanceModel;
    private $staffModel;
    private $holidayModel;
    function __construct()
    {
        $this->attendanceModel = $this->callModel('AttendanceModel');
        $this->staffModel = $this->callModel('StaffModel');
        $this->holidayModel = $this->callModel('HolidayModel');
    }
    function Show()
    {
        $currenYear = date("Y");
        $currenMonth = date("m");
        $this->callView('Master', [
            'Page' => 'SalaryPage',
            'staff' => $this->staffModel->getAllSalary($currenYear, $currenMonth),
            'month' => $currenMonth,
            'year' => $currenYear
        ]);
    }
    function Sort()
    {
        if (!empty($_POST)) {
            $date = explode('-', $_POST['date_sort']);
            $this->callView('Master', [
                'Page' => 'SalaryPage',
                'staff' => $this->staffModel->getAllSalary($date[0], $date[1]),
                'month' => $date[1],
                'year' => $date[0]
            ]);
        } else {
            header('Location: ../Salary');
        }
    }
    function calculatorSalary()
    {

        if (empty($_POST)) return http_response_code(422);
        $Date = explode("-", $_POST['currentDate']);
        $Date = [
            'year' => $Date[0],
            'month' => $Date[1]
        ];
        $totalWork = $this->attendanceModel->getTotal($_POST['uId'], true, $Date);
        $holiday = $this->holidayModel->getHoliday($Date);
        if ($holiday) {
            $holiday = $holiday->fetch_assoc()['holiday'];
        } else {
            $holiday = 0;
        }
        $totalMin = 0;
        foreach ($totalWork as &$row) {
            $totalMin += $row['totalMin'];
        }
        $salary = $this->staffModel->getContract($_POST['uId']);
        print_r(json_encode([
            'totalMin' => $totalMin,
            'salary' => $salary['luong_cung'],
            'holiday' => $holiday,
            'monthSalary' => calculatorSalary($holiday, $totalMin, $salary['luong_cung']) // function in lib
        ]));
    }
}
