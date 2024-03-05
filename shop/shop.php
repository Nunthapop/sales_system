<?php
include "../header/nav_cus.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        ul li {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            padding: auto;
        }
    </style>
</head>

<body>
    <h1>Shop</h1>
    <ul>
        <li>
            <img src="warm_hug.jpg" alt="Warm hug">
            <h3>Warm hug</h3>
            <p>Price : 200฿</p>
            <form action="">
                <label for="warmhug_paraffin">Paraffin Wax +19฿</label>
                <input type="text" id="warmhug_paraffin" name="warmhug_paraffin_quantity">
                <br>
                <label for="warmhug_soy">Soy Wax +29฿</label>
                <input type="text" id="warmhug_soy" name="warmhug_soy_quantity">
                <button type="submit">Add to cart</button>
            </form>
        </li>
        <li>
            <img src="raindrops.jpg" alt="Raindrops">
            <h3>Raindrops</h3>
            <p>Price : 200฿</p>
            <form action="">
                <label for="raindrops_coconut">Coconut Wax +29฿</label>
                <input type="text" id="raindrops_coconut" name="raindrops_coconut_quantity">
                <br>
                <label for="raindrops_bees">Bees Wax +19฿</label>
                <input type="text" id="raindrops_bees" name="raindrops_bees_quantity">
                <button type="submit">Add to cart</button>
            </form>
        </li>
        <li>
            <img src="malibu_nights.jpg" alt="Malibu nights">
            <h3>Malibu nights</h3>
            <p>Price : 200฿</p>
            <form action="">
                <label for="malibu_jasmine">Jasmine Rice Wax +39฿</label>
                <input type="text" id="malibu_jasmine" name="malibu_jasmine_quantity">
                <br>
                <label for="malibu_paraffin">Paraffin Wax +19฿</label>
                <input type="text" id="malibu_paraffin" name="malibu_paraffin_quantity">
                <button type="submit">Add to cart</button>
            </form>
        </li>
        <li>
            <img src="chiang_mai.jpg" alt="Chiang mai">
            <h3>Chiang mai</h3>
            <p>Price : 200฿</p>
            <form action="">
                <label for="chiangmai_soy">Soy Wax +29฿</label>
                <input type="text" id="chiangmai_soy" name="chiangmai_soy_quantity">
                <br>
                <label for="chiangmai_coconut">Coconut Wax +29฿</label>
                <input type="text" id="chiangmai_coconut" name="chiangmai_coconut_quantity">
                <br>
                <label for="chiangmai_jasmine">Jasmine Rice Wax +39฿</label>
                <input type="text" id="chiangmai_jasmine" name="chiangmai_jasmine_quantity">
                <button type="submit">Add to cart</button>
            </form>
        </li>
        <li>
            <img src="la_vie_en_rose.jpg" alt="La vie en rose">
            <h3>La vie en rose</h3>
            <p>Price : 200฿</p>
            <form action="">
                <label for="lavie_bees">Bees Wax +19฿</label>
                <input type="text" id="lavie_bees" name="lavie_bees_quantity">
                <br>
                <label for="lavie_soy">Soy Wax +29฿</label>
                <input type="text" id="lavie_soy" name="lavie_soy_quantity">
                <button type="submit">Add to cart</button>
            </form>
        </li>
    </ul>
</body>

</html>