<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
a{
    display:block;
    margin-bottom:15px;
}

body{
    font-family:'Roboto';
    display:flex;
    flex-wrap:wrap;
    justify-content:space-around;
}

section{
    margin-bottom:2rem;
    width:250px;
    box-sizing:border-box;
    border:1px solid lightgrey;
}

div:first-of-type{
    display:flex;
    height:200px;
    width:100%;
}

div:last-of-type{
    box-sizing:border-box;
    padding:5px 15px;
}

span{
    color:#95eb34;
    font-weight:bolder;
    font-style:italic;
    font-size:1.45rem;
}

img{
    object-fit:cover;
    width:100%;
}
</style>

<body>
    <?php 

    include_once 'views/products_data.php';

    // $cart = new stdClass();
    // $cart->numberOfProducts = 5;
    // $cart->totalPrice = 99.99;
    // echo $cart->totalPrice;

    require_once 'models/CartItem.php';
    require_once 'models/cart.php';
    $cartItem = new CartItem('ABC123', 12.5,17);
    $cartItem2 = new CartItem('defsf', 12.45);

    $cart->add($cartItem);
    $cart->add($cartItem2);

    echo $cartItem->getSubtotal();

    // $tester = "2";
    // $intTester = (int) $tester;
    // var_dump($intTester);

    foreach ($products as $product) {
        include "views/detail.php";
    }

    ?>
</body>
</html>