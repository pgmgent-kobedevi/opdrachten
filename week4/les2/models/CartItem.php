<?php 

class CartItem{
    public $product_code;
    public $price;
    public $quantity;

    public function __construct(string $product_code='', float $price=0, int $quantity=0){
        $this->product_code = $product_code;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getSubTotal(): float {
        $subtotal = $this->price*$this->quantity;
        return $subtotal;
    }
}