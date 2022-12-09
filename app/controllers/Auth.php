<?php
class Auth extends Controller
{
    use HandleMail;
    use LoopData;
    public $staffModel;
    public $accModel;

    function __construct()
    {
        if ($this->checkUser()) {
            header('location: ./Attendance');
        }
        $this->userModel = $this->callModel('UserModel');
        $this->staffModel = $this->callModel('StaffModel');
        $this->accModel = $this->callModel('AccModel');
    }
    function Show()
    {
        $this->callView('MasterAuth', [
            'Page' => 'LoginPage',
        ]);
    }
    function Login()
    {
        $array_data = ['cmnd_login', 'password'];
        $error = $this->LoopCheckError($array_data, $_POST);
        // PrintDisplay::printFix($error);
        if (empty($error)) {
            $uid = $_POST['cmnd_login'];
            $password = $_POST['password'];
            $res = $this->accModel->findData('tai_khoan', $uid, "*");
            $res = !empty($res) ? $res->fetch_assoc() : '';
            if (!empty($res['mat_khau'])) {
                $check_pass = password_verify($password, $res['mat_khau']);
                if (!empty($check_pass)) {
                    $dataNew = [
                        'id' => $res['maNV'],
                        'uid' => $res['tai_khoan'],
                        'role' => $res['chuc_vu'],
                        'name' => $res['ho_ten'],
                        'avatar' => $res['hinh_anh'],
                    ];
                    $_SESSION['user'] = $dataNew;
                    if ($dataNew['role'] == 1) {
                        header('location: ../DashBoard');
                    } else {
                        header('location: ../Attendance');
                    }
                    return;
                } else {
                    $error['cmnd_login'] = 'Sai id căn cước hoặc mật khẩu';
                }
            } else {
                $error['cmnd_login'] = 'Sai id căn cước hoặc mật khẩu';
            }
        }

        $this->callView('MasterAuth', [
            'Page' => 'LoginPage',
            'error' => $error,
            'old_value' => $_POST
        ]);
    }

    function ResetPass()
    {
        if (empty($_POST['can_cuoc'])) {
            $this->callView('MasterAuth', [
                'Page' => 'LoginPage',
                'status' => 'Invalid CMND'
            ]);
            return;
        }
        $can_cuoc = $_POST['can_cuoc'];
        $res = $this->staffModel->findData('can_cuoc', $can_cuoc, "email");
        $email = $res->fetch_assoc();
        if (!empty($email)) {
            $mail = $email['email'];
            $code = uniqid();
            $kq = $this->SendMailPass($code, $mail);
            if ($kq) {
                $response =  $this->staffModel->updateData('tb_taikhoan', 'khoi_phuc', $code, "tai_khoan", $_POST['can_cuoc']);
                if ($response) {
                    $_SESSION['uid'] = $can_cuoc;
                    $this->callView('MasterAuth', [
                        'Page' => "ResetPage",
                    ]);
                } else {
                    $this->callView('MasterAuth', [
                        'Page' => 'LoginPage',
                        'status' => 'Server bận'
                    ]);
                }
            }
        } else {
            $this->callView('MasterAuth', [
                'Page' => 'LoginPage',
                'status' => 'Không có tài khoản nào trùng khớp'
            ]);
            return;
        }
    }

    function checkCode()
    {
        if (empty($_SESSION['uid'])) return;
        $uid = $_SESSION['uid'];
        if (empty($_POST['newpass']) || empty($_POST['renewpass']) || empty($_POST['code'])) {
            $error = "Missing Value";
        } else if ($_POST['newpass'] != $_POST['renewpass']) {
            $error = "Mật khẩu không giống nhau";
        }

        if (empty($error)) {
            $res =  $this->accModel->findData('tai_khoan', $uid);
            if (!empty($res)) {
                $codeKp = $res->fetch_assoc();
                if ($_POST['code'] == $codeKp['khoi_phuc']) {
                    $newPass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                    $response =  $this->accModel->updateData('mat_khau', $newPass, $uid);
                    if ($response) {
                        $this->accModel->updateData('khoi_phuc', null, $uid);
                        $this->callView('MasterAuth', [
                            'Page' => 'LoginPage',
                            'status' => 'Đổi mật khẩu thành công'
                        ]);
                        return;
                    } else {
                        $error = "Server not response";
                    }
                } else {
                    $error = "Mã code không đúng";
                }
            } else {
                $error = "Invalid user ID";
            }
        }
        $this->callView('MasterAuth', [
            'Page' => 'ResetPage',
            'status' => $error
        ]);
    }
}
