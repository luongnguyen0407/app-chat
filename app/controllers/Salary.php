<?php
class Salary extends Controller
{
    function Show()
    {

        $this->callView('Master', [
            'Page' => 'SalaryPage',
        ]);
    }
}
