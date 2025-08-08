<?php 
include("./includes/header.php"); 

include('./admin/config/db.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "You Dont Have Permission to Access This Page";
    header("Location: ./login.php");
    exit();
}


?>


<div class="nav-block">
    <div class="hero">
        <div class="hero-block">
            <h2 class="hero-caps">Select Your New Perfect Style</h2>
            <p class="hero-content">
                Lorem consectetur adipisicing elit. tenetur deleniti molestias, inventore repudiandae eveniet nulla
                dolorum?
            </p>
            <a href="./shop.php"><button class="shop-btn">SHOP NOW</button></a>
        </div>
        <div class="hero-block2">
            <div class="hero-blck-div"><img class="hero-blck-img" src="./assets/img/img41.jpg" alt=""></div>
        </div>
    </div>
</div>

<!-- shop -->
<main>
    <div class="services">
        <h2 class="service-header">Popular Items</h2>
        <p class="small-cap">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda reprehenderit totam
            architecto
            placeat magni, atque saepe!</p>

        <div class="items-row">
            <?php


                          $product_query = "SELECT prod_id, prod_name, prod_cat, prod_qty, prod_price, prod_dec, prod_img FROM products";

                          $sql_conn = mysqli_query($conn, $product_query);

                          while( $row = mysqli_fetch_assoc($sql_conn)){

                          ?>
                                <form action="./includes/process.php" method="post" enctype="multipart/form-data">
                                    <input type="text" hidden value="<?= $row['prod_id']?>" name="prod_id">
                                    <input type="text" hidden value="<?= $row['prod_name']?>" name="prod_name">
                                    <input type="text" hidden value="<?= $row['prod_price']?>" name="prod_price">
                                    <input type="text" hidden value="1" name="prod_qty">
                                    <input type="text" hidden value="<?=$row['prod_img']?>" name="prod_img">
                                    <div class="items-col">
                                    <div class="items-img">
                                        <img src="./admin/assets/uploads/<?=  $row['prod_img']?>" alt="">
                                        <div class="services-card">
                                            <button type="submit" name="add-to-cart" onclick="addToCart()" class="add-card">
                                                <span class="card-span">Add To Card</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="h4-cap"><?= $row['prod_name']?></h4>
                                        <span class="card-span">$ <?= $row['prod_price']?></span>
                                    </div>
                                </div>
                                </form>
            <?php
                          }

                            ?>


        </div>
        <a href="./shop.php">
            <button class="shop-btn">Read More</button>
        </a>
    </div>
</main>

<!-- choice -->
<div class="choice">
    <div class="choice-row">
        <div class="choice-col">
            <div class="choice-content">
                <h1 class="choice-h1">Watch of choice</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non eligendi delectus ipsa voluptatum
                    ab in laborum? Neque, soluta minima, quis quos natus quae sint molestias pariatur reprehenderit
                    adipisci dolore Lorem ipsum dolor sit amet consectetur adipisicing Lorem ipsum sit.
                </p>
                <button class="choice-btn" >Show Watches</button>
            </div>
            <div class="choice-img"><img src="./assets/img/img1.png" alt=""></div>
        </div>

        <div class="choice-col">
            <div class="choice-content">
                <h1 class="choice-h1">Watch of choice</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non eligendi delectus ipsa voluptatum
                    ab in laborum? Neque, soluta minima, quis quos natus quae sint molestias pariatur reprehenderit
                    adipisci dolore Lorem ipsum dolor sit amet consectetur adipisicing Lorem ipsum sit.
                </p>
                <button class="choice-btn">Show Watches</button>
            </div>
            <div class="choice-img"><img src="./assets/img/img48.jpg" alt=""></div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>