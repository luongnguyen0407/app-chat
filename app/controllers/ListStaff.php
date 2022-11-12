<?php
class ListStaff extends Controller
{
    use LoopData;
    public $staffModal;


    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'ListStaffPage',
            'staff' => $this->returnArray($this->staffModal->getAllStaff())
        ]);
    }

    function viewDetails($id)
    {
        if (empty($id)) return;
        $res = $this->staffModal->findData('maNV', $id, "*");
        $res = $res->fetch_assoc();
        // PrintDisplay::printFix($res);
        $this->callView('Master', [
            'Page' => 'ShowDetailPage',
            'staff' => $this->returnArray($this->staffModal->getAllStaff())
        ]);
    }
}
