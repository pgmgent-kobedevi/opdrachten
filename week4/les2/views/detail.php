<section>
    <div>
        <img src="<?php echo $product['photo'] ?>" alt="<?php echo $product['name']?>">
    </div>
    <div>
        <h2><?php echo $product['name']?></h2>
        <span>€ <?php echo $product['price']?></span><br>
        <a href="add_to_cart.php">Add to cart</a>
        <article><?php echo $product['description']?></article>
    </div>
</section>