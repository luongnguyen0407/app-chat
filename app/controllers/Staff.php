<?php
class Staff extends Controller
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

    function Update($id)
    {
        if (empty($id)) return;
        $res = $this->staffModal->findData('maNV', $id, "*");
        if (!$res) {
            $this->callView('Master', [
                'Page' => 'pagenotpound',
                'staff' => $res
            ]);
            return;
        }
        $res = $res->fetch_assoc();
        $address = explode(",", $res['dia_chi']);
        $keyAddress = ['thanh_pho', 'huyen', 'xa'];
        $address = array_combine($keyAddress, $address);
        $res = array_merge($res, $address);
        $this->callView('Master', [
            'Page' => 'UpdateStaffPage',
            'old_value' => $res
        ]);
    }
    function viewDetails($id)
    {
        if (empty($id)) return;
        $res = $this->staffModal->findData('maNV', $id, "*");
        // PrintDisplay::printFix($res);
        if (!$res) {
            $this->callView('Master', [
                'Page' => 'pagenotpound',
                'staff' => $res
            ]);
            return;
        }
        $res = $res->fetch_assoc();
        $this->callView('Master', [
            'Page' => 'ShowDetailPage',
            'staff' => $res
        ]);
    }
}
