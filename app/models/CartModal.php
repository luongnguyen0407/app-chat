<?php
class CartModal extends DB
{
    public function getAmountInCart($id)
    {
        if (empty($id)) {
            return '0';
        }
        $sql = "SELECT COUNT(idCart)
        FROM cart WHERE maKH = $id";
        // return json_encode($arr);
        if ($this->link->query($sql)) {
            # code...
            return  $this->link->query($sql)->fetch_array(MYSQLI_NUM);
        }
    }
    public function getAllProduct($userId)
    {

        $sql = "SELECT cart.idCart, cart.soLuong, cart.maSanPham, sanpham.tenSanPham, sanpham.giaSanPham, sanpham.srcImg FROM `cart` INNER JOIN `sanpham` ON cart.maSanPham = sanpham.maSanPham WHERE cart.maKH = $userId";
        $res = $this->link->query($sql);
        if ($res) {
            $arr = array();
            while ($row = mysqli_fetch_array($res)) {
                $arr[] = $row;
            }
            return $arr;
        }
    }

    public function delProduct($cartId, $userId, $all)
    {
        $sql = "DELETE FROM `cart` WHERE idCart = $cartId AND maKH = $userId";
        if (!empty($all)) {
            $sql = "DELETE FROM `cart` WHERE maKH = $userId";
        }
        if ($this->link->query($sql)) {
            # code...
            echo true;
        } else {
            echo "0";
        }
    }
    public function updateProduct($idProduct, $userId, $amount)
    {
        $sql = "UPDATE `cart` SET `soLuong`=$amount WHERE cart.idCart = $idProduct AND cart.maKH = $userId;";
        if ($this->link->query($sql)) {
            echo true;
            return;
        }
    }
    public function addCart($idProduct, $idKh)
    {
        $kt = "SELECT COUNT(idCart) FROM `cart` WHERE maSanPham = $idProduct AND maKH = $idKh";
        // return $idProduct;
        if ($this->link->query($kt)) {
            # code...
            $res =  $this->link->query($kt)->fetch_array(MYSQLI_NUM)[0];
            if ($res > 0) {
                $sqlUpdate = "UPDATE `cart` SET `soLuong`= `soLuong` + 1 WHERE cart.maSanPham = $idProduct AND cart.maKH = $idKh";
                if ($this->link->query($sqlUpdate)) {
                    return true;
                }
            } else {
                $sql = "INSERT INTO `cart`(`maSanPham`, `maKH`, `soLuong`) VALUES ('$idProduct','$idKh','1')";
                if ($this->link->query($sql)) {
                    return true;
                }
            }
        }
    }
}
