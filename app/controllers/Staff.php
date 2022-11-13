<?php
class Staff extends Controller
{
    use LoopData;
    public $staffModal;
    public $positionModal;
    public $departmentModal;

    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
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
            'Position' => $this->returnArray($this->positionModal->getPosition()),
            'Department' => $this->returnArray($this->departmentModal->getDepartment()),
            'old_value' => $res
        ]);
    }

    public function updateAction($id)
    {
        $response = $this->staffModal->findData('maNV', $id, "*");
        $response = $response->fetch_assoc();
        $arrData = [
            "name",
            "phone",
            "email",
            "can_cuoc",
            "gender",
            "department",
            "position",
            "sinh_nhat",
            "thanh_pho",
            "huyen",
            "xa",
            "salary",
            "trinh_do",
            "hop_dong_id",
            "date_start",
            "date_end",
        ];
        $error = $this->LoopCheckError($arrData, $_POST);
        $dataUpdate = $_POST;
        $today = date("Y-m-d");
        $nowYear = date("Y");
        $file = empty($_FILES['file_avatar']) ? [] : $_FILES['file_avatar'];
        // PrintDisplay::printFix($file);
        // die;
        if (empty($error)) {
            if ($dataUpdate['email'] != $response['email']) {
                if ($this->staffModal->findData('email', $dataUpdate['email'])) $error['email'] = 'Email này đã tồn tại';
            }
            if ($dataUpdate['can_cuoc'] != $response['can_cuoc']) {
                if ($this->staffModal->findData('can_cuoc', $dataUpdate['can_cuoc'])) $error['can_cuoc'] = 'Số căn cước này đã tồn tại';
            }
            if (empty($file['name'])) {
                $flag = false;
                $dataUpdate['img'] = $response['hinh_anh'];
            } else {
                $flag = true;
                $imgUp =  $this->ValidateImg($file);
                $imgUp ? $dataUpdate['img'] = $imgUp : $error["file_avatar"] = 'Ảnh không đúng định dạng hoặc quá lớn';
            }
            if (!filter_var($dataUpdate['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email không đúng hoặc bị trống";
            }
            //check date birthday
            if (!empty($dataUpdate['sinh_nhat'])) {
                $date = DateTime::createFromFormat("Y-m-d", $dataUpdate['sinh_nhat']);
                $yearSN = $date->format("Y");
                if ($nowYear - $yearSN <= 18) $error['sinh_nhat'] = 'Invalid value';
            }
            if ($dataUpdate['date_end'] <= $today) $error['date_end'] = 'Invalid value';
            if ($dataUpdate['date_start'] >= $dataUpdate['date_end']) $error['date_start'] = 'Invalid value';
            if (empty($error)) {
                $dataUpdate['dia_chi'] = $dataUpdate['thanh_pho'] . "," . $dataUpdate['huyen'] . "," . $dataUpdate['xa'];
                $kq = $this->staffModal->updateStaff($dataUpdate, $response);
                if ($kq) {
                    if ($flag) {
                        move_uploaded_file($file['tmp_name'], './public/img/upload/' . $imgUp);
                        if ($response['hinh_anh'] != 'photo-def.jpg') {
                            unlink('./public/img/upload/' . $response['hinh_anh']);
                        }
                    }
                    header('location: ../../../quanlynhanvien/Staff');
                    exit;
                }
            }
        }
        $dataUpdate['maNV'] = $response['maNV'];
        $this->callView('Master', [
            'Page' => 'UpdateStaffPage',
            'Position' => $this->returnArray($this->positionModal->getPosition()),
            'Department' => $this->returnArray($this->departmentModal->getDepartment()),
            'error' => $error,
            'old_value' => $dataUpdate
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
