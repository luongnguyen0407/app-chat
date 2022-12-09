<?php
class Salary extends Controller
{
    private $attendanceModel;
    private $staffModel;
    function __construct()
    {
        $this->attendanceModel = $this->callModel('AttendanceModel');
        $this->staffModel = $this->callModel('StaffModel');
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
        $totalMin = 0;
        foreach ($totalWork as &$row) {
            $totalMin += $row['totalMin'];
        }
        $salary = $this->staffModel->getContract($_POST['uId']);
        print_r(json_encode([
            'totalMin' => $totalMin,
            'salary' => $salary['luong_cung']
        ]));
    }
}
