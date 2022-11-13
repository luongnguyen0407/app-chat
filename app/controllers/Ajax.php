<?php
class Ajax extends Controller
{

    public $staffModal;
    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
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
}
