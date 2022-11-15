<?php
class Ajax extends Controller
{

    public $staffModal;
    public $accModal;
    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
        $this->accModal = $this->callModal('AccModal');
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
            $res = $this->staffModal->updateData('tb_nhanvien', 'hinh_anh', $file, 'maNV', $user['id']);
            if ($res) {
                $user['avatar'] =  $file;
                $_SESSION['user'] = $user;
                echo 'ok';
                return;
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    public function updatePass()
    {
        # code...
        if (!$this->checkUser() || empty($_POST['passOld']) || empty($_POST['passNew']) || empty($_POST['passNewRef'])) return;
        if ($_POST['passNew'] != $_POST['passNewRef']) return;
        // print_r($_POST);
        $uId = $_SESSION['user']['id'];
        $this->accModal->updatePass($uId, $_POST['passNew'], $_POST['passOld']);
    }
}
