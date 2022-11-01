<?php
class Home extends Controller
{
    public $productModal;
    public $cartModal;

    function __construct()
    {
        //modal
        $this->productModal = $this->callModal('ProductModal');
        $this->cartModal = $this->callModal('CartModal');
    }

    function Show()
    {
        $userId = !empty($_SESSION['user']['idKH']) ? $_SESSION['user']['idKH'] : null;
        $this->callView('Master1', [
            'Page' => 'HomePage',
            'Product' => $this->productModal->getProductLimit(0, 5),
            'amountCart' => $this->cartModal->getAmountInCart($userId)
        ]);
    }
    function detailProduct($id)
    {
        echo $id;
    }
}
