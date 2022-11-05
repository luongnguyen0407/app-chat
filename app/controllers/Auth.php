<?php
class Auth extends Controller
{
    use HandleMail;
    public $staffModal;
    public $accModal;

    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
        $this->accModal = $this->callModal('AccModal');
    }

    function Show()
    {
        $this->callView('MasterAuth', [
            'Page' => 'LoginPage',
        ]);
    }

    function Login()
    {
        if (empty($_POST['cmnd_login']) || empty($_POST['password'])) {
            $error = "Missing Value";
        }
    }

    function ResetPass()
    {
        if (empty($_POST['can_cuoc'])) {
            $this->callView('MasterAuth', [
                'Page' => 'LoginPage',
                'error' => 'Invalid CMND'
            ]);
            return;
        }
        $can_cuoc = $_POST['can_cuoc'];
        $res = $this->staffModal->findData('can_cuoc', $can_cuoc, "email");
        $email = $res->fetch_assoc();
        if (!empty($email)) {
            $mail = $email['email'];
            $code = uniqid();
            $kq = $this->SendMailPass($code, $mail);
            if ($kq) {
                $response =  $this->staffModal->updateData('tb_taikhoan', 'khoi_phuc', $code, "tai_khoan", $_POST['can_cuoc']);
                if ($response) {
                    $_SESSION['uid'] = $can_cuoc;
                    $this->callView('MasterAuth', [
                        'Page' => "ResetPage",
                    ]);
                } else {
                    $this->callView('MasterAuth', [
                        'Page' => 'LoginPage',
                        'error' => 'Server bận'
                    ]);
                }
            }
        } else {
            $this->callView('MasterAuth', [
                'Page' => 'LoginPage',
                'error' => 'Không có tài khoản nào trùng khớp'
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
            $res =  $this->accModal->findData('tai_khoan', $uid);
            if (!empty($res)) {
                $codeKp = $res->fetch_assoc();
                if ($_POST['code'] == $codeKp['khoi_phuc']) {
                    $newPass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                    $response =  $this->accModal->updateData('mat_khau', $newPass, $uid);
                    if ($response) {
                        $this->accModal->updateData('khoi_phuc', null, $uid);
                        $this->callView('MasterAuth', [
                            'Page' => 'LoginPage',
                            'error' => 'Đổi mật khẩu thành công'
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
            'error' => $error
        ]);
    }
}
