<?php

class Cart {

    private $items;
    public function __construct(){
        $this->items = [];
    }

    public function add(CartItem $items){
        $this->items[] = $items;
    }

}