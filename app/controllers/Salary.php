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

        $this->callView('Master', [
            'Page' => 'SalaryPage',
        ]);
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
        $totalMinHoliday = 8 * 60 * $holiday; //work 8h for day;
        $totalMinWork = $totalMin + $totalMinHoliday;
        $salaryOfMin = $salary['luong_cung'] / (20 * 8 * 60); // 20 day work, 8h of day, 60 min
        print_r(json_encode([
            'totalMin' => $totalMin,
            'salary' => $salary['luong_cung'],
            'holiday' => $holiday,
            'monthSalary' => $salaryOfMin * $totalMinWork
        ]));
    }
}
