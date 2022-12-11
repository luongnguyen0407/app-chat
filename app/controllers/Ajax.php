<?php
class Ajax extends Controller
{
    use LoopData;
    use HandleMail;
    private $staffModel;
    private $accModel;
    private $departmentModel;
    private $holidayModel;
    function __construct()
    {
        $this->staffModel = $this->callModel('StaffModel');
        $this->accModel = $this->callModel('AccModel');
        $this->departmentModel = $this->callModel('DepartmentModel');
        $this->holidayModel = $this->callModel('HolidayModel');
    }

    function updateAvatarBase64()
    {
        // if (empty($_POST['image'])) return;
        $user = $_SESSION['user'];
        $folderPath = './public/img/upload/';
        $image_parts = explode(";base64,", $_POST['image']);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = 'avatar' . uniqid() . '.png';
        $kq = file_put_contents($folderPath . $file, $image_base64);
        if ($kq) {
            $res = $this->staffModel->updateData('tb_nhanvien', 'hinh_anh', $file, 'maNV', $user['id']);
            if ($res) {
                $user['avatar'] =  $file;
                $_SESSION['user'] = $user;
                return http_response_code(200);
            } else {
                return http_response_code(500);
            }
        } else {
            return http_response_code(401);
        }
    }

    public function updatePass()
    {
        # code...
        if (!$this->checkUser() || empty($_POST['passOld']) || empty($_POST['passNew']) || empty($_POST['passNewRef'])) return;
        if ($_POST['passNew'] != $_POST['passNewRef']) return;
        // print_r($_POST);
        $uId = $_SESSION['user']['id'];
        $this->accModel->updatePass($uId, $_POST['passNew'], $_POST['passOld']);
    }

    public function getDepartment()
    {
        # code...
        $listDepartment =  $this->returnArray($this->departmentModel->getDepartment());
        echo json_encode($listDepartment);
    }
    public function updateDepartment()
    {
        # code...
        if (empty($_POST['id']) || empty($_POST['idNew']) || empty($_POST['nameNew'])) {
            return  http_response_code(401);
        }
        $idDepart =  strlen($_POST['idNew']) > 5 ? substr($_POST['idNew'], 0, 5) : $_POST['idNew'];
        $upDepart = strtoupper($idDepart);
        $kq =  $this->departmentModel->updateDepartment($_POST['id'], $upDepart, ucwords($_POST['nameNew']));
        if ($kq) return http_response_code(200);
        http_response_code(500);
    }

    public function updateHoliday()
    {
        # code...
        if (empty($_POST['id']) || empty($_POST['dateNew']) || empty($_POST['nameNew'])) {
            return  http_response_code(401);
        }
        $kq =  $this->holidayModel->updateHoliday($_POST['id'], $_POST['dateNew'], ucwords($_POST['nameNew']));
        if ($kq) return http_response_code(200);
        http_response_code(500);
    }
    public function getHoliday()
    {
        # code...
        $kq = $this->holidayModel->getHoliday();
        if ($kq) {
            echo json_encode($this->returnArray($kq));
        } else {
            http_response_code(500);
        }
    }

    public function ResetPassword()
    {
        if (empty($_POST['idStaff'])) {
            return  http_response_code(401);
        }
        try {
            //code...
            $res = $this->staffModel->findData('maNV', $_POST['idStaff'], "email");
            $email = $res->fetch_assoc();
            if (!empty($email)) {
                $mail = $email['email'];
                $code = uniqid();
                $kq = $this->SendMailPass($code, $mail);
                if ($kq) {
                    $passHash = password_hash($code, PASSWORD_DEFAULT);
                    $response =  $this->staffModel->updateData('tb_taikhoan', 'mat_khau', $passHash, "maNV", $_POST['idStaff']);
                    if ($response) return http_response_code(200);
                    return  http_response_code(401);
                }
            } else {
                return  http_response_code(401);
            }
        } catch (\Throwable $th) {
            return  http_response_code(401);
        }
    }
}
