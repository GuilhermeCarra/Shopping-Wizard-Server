<?php
    if (!isset($_GET["productId"])) header("Location: index.php");
    session_start();
    $_SESSION["productId"] = $_GET["productId"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Jordan shoes</title>
</head>

<body>
    <div id="box_0">
        <?php include('header.php') ?>
        <main class="d__flex" id="box_1_main">
            <div class="main_left d__flex">
                <div id="ml_preview">
                    <img class="ml_preview_image" id="mlp_image1" src="">
                    <!--Img1-->
                    <img class="ml_preview_image" id="mlp_image2" src="">
                    <!--Img2-->
                    <img class="ml_preview_image" id="mlp_image3" src="">
                    <!--Img3-->
                    <img class="ml_preview_image" id="mlp_image4" src="">
                    <!--Img4-->
                    <img class="ml_preview_image" id="mlp_image5" src="">
                    <!--Img5-->
                </div>
                <div id="ml_image">
                    <img class="ml_big_image" id="ml_image1" src="">
                    <!--Img-->
                </div>
            </div>
            <div class="main_right">
                <h2 id="main_title">
                    <!--Title-->
                </h2>
                <div class="main_normal_text">
                    <div class="main_normal_text">
                        <!--Price-->
                        Price
                        <h2 id="main_show_price">
                        </h2>
                    </div>
                    <div class="main_normal_text">
                        <!--Size-->
                        Size
                        <div class="main_size_selector main_normal_text">
                            <select id="size_selector">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="main_normal_text">
                    <div class="main_normal_text">
                        <!--color-->
                        Color
                        <div id="mr_color" class="main_normal_text">
                            <img class="mr_color_image" src="">     <!--Img1-->
                            <img class="mr_color_image" src="">     <!--Img2-->
                            <img class="mr_color_image" src="">     <!--Img3-->
                        </div>
                    </div>
                </div>
                <button class="black_button" onclick="buy()">BUY</button>
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer">
            <div class="footer-copyright text-center py-4">© 2020 Copyright:
            <a href="/index.php">Nice Shoes</a>
            </div>
        </footer> <!-- Footer -->
    </div>

    <div id="FormPage">
        <header style="position:relative">
            <div class="connector"></div>

            <ul class="d__flex" style="position:absolute; z-index: 1;">
                <li class="flex_column" >
                    <div class="top_menu_text">Profile</div>
                    <div class="div_circle"></div>
                </li>

                <li class="flex_column" >
                    <div class="top_menu_text">Address</div>
                    <div class="div_circle"></div>
                </li>

                <li class="flex_column" >
                    <div class="top_menu_text">Shipping</div>
                    <div class="div_circle"></div>
                </li>

                <li class="flex_column" >
                    <div class="top_menu_text">Finish</div>
                    <div class="div_circle"></div>
                </li>

            </ul>
        </header>
        <div id="time_alert"></div>
        <main id="box_1">
            <form>
                <h2>Step 1 - Profile</h2>
                <fieldset>
                    <label for="user">Username<span class="required_dot">*</span></label><br>
                    <input type="text" class="step1_input" name="username" autocomplete="off" placeholder="Username">
                </fieldset><br>

                <fieldset>
                    <label for="email">Email<span class="required_dot">*</span></label><br>
                    <input type="email" class="step1_input" name="email" autocomplete="off"
                        placeholder="email@email.com">
                </fieldset><br>

                <fieldset>
                    <label for="password">Password<span class="required_dot">*</span></label><br>
                    <input type="password" class="step1_input" name="password" autocomplete="off"
                        placeholder="Abcde1!">
                </fieldset><br>

                <fieldset>
                    <label for="confrim password">Confirm Pasword<span class="required_dot">*</span></label><br>
                    <input type="password" class="step1_input" name="confrim password" autocomplete="off"
                        placeholder="Abcde1!">
                </fieldset>
            </form>
        </main>

        <main id="box_2">
            <form>
                <h2>Step 2 - Address</h2>
                <fieldset>
                    <label for="firstname">First name<span class="required_dot">*</span></label><br>
                    <input type="text" class="step2_input" name="firstname" autocomplete="off" placeholder="Beron"><br>
                </fieldset>

                <fieldset>
                    <label for="last name">Last name<span class="required_dot">*</span></label><br>
                    <input type="text" class="step2_input" name="Last name" autocomplete="off" placeholder="Gamboa">
                </fieldset><br>

                <fieldset>
                    <label for="birthday">Birthday<span class="required_dot">*</span></label><br>
                    <input type="date" name="birthday" autocomplete="off">
                </fieldset><br>

                <fieldset>
                    <label for="Adress1">Adress 1<span class="required_dot">*</span></label><br>
                    <input type="text" class="step2_input" name="Address" autocomplete="off" placeholder="Industria 22 p1 2">
                </fieldset><br>

                <fieldset>
                    <label for="Adress2">Adress 2</label><br>
                    <input type="text" name="Address2" autocomplete="off" placeholder="Comte d'urgell 45 p3 3">
                </fieldset><br>

                <fieldset>
                    <Label for="postal">Postal code<span class="required_dot">*</span></label><br>
                    <input type="text" class="step2_input" name="postal" autocomplete="off" pattern="[0-9]{5}" title="Five digit zip code"
                        placeholder="07053" />
                </fieldset><br>

                <fieldset>
                    <label for="country">Country<span class="required_dot">*</span></label><br>
                    <select name="country" class="country_names" id="list">
                        <option value="Andorra">Andorra</option>
                        <option value="España">España</option>
                        <option value="Francia">Francia</option>
                        <option value="Alemania">Alemania</option>
                        <option value="Grecia">Grecia</option>
                    </select>
                </fieldset><br>

                <fieldset>
                    <label for="Phone">Phone<span class="required_dot">*</span></label><br>
                    <select name="Phone">
                        <option data-countryCode="AND" value="376">AND</option>

                        <option data-countryCode="ESP" value="34">ESP</option>

                        <option data-countryCode="FRA" value="33">FRA</option>

                        <option data-countryCode="DEU" value="49">DEU</option>

                        <option data-countryCode="GRC" value="30">GRC</option>
                    </select>
                    <input type="tel" class="step2_input" autocomplete="off" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"
                        placeholder="798 213 456">
                </fieldset><br>

                <input type="checkbox" class="radio" name="checkbox" autocomplete="off">
                <label for="checkbox" class="fix">This is my regular address</label>


            </form>

        </main>

        <main id="box_3">

            <h2>Step 3 - Shipping</h2>

            <form action="" id="radio_parent">
                <h4 class="shipping">Shipping type<span class="required_dot">*</span></h4><br>
                <input type="radio" class="radio" id="radio_1" name="shipment" autocomplete="off" value="free">
                <label for="free" class="fix">Free shipment(72H)</label><br><br>

                <input type="radio" class="radio" id="radio_2" name="shipment" autocomplete="off" value="extra">
                <label for="extra" class="fix">Extra shipping(48H)</label><br><br>

                <input type="radio" class="radio" id="radio_3" name="shipment" autocomplete="off" value="prem">
                <label for="premium" class="fix">Premium(24H)</label><br><br>

                <div id="shipping_details">
                    <h3>Your order will arrive:</h3><br>
                    <span id="estimate">ESTIMATE DELIVERY DAY:</span><br>
                    <div class="main_normal_text">Between <span id="date_1"></span> and <span id="date_2"></span></div>
                </div><br>

                <input type="checkbox" class="radio" name="gift" id="gift_checkbox" autocomplete="off">
                <label for="gift" class="fix"> Is it a gift?</label><br><br>

                <div id="gift_text">
                        <label for="message">Gift message</label><br>
                        <textarea name="" cols="30" rows="5"></textarea><br><br>
                    <!-- <div class="fileinputs"><input type="file" class="file" />

                        <div class="fakefile"><input />
                     </div> -->
                        <label for="gift image">Gift wrapper image</label><br>
                        <input type="file"id="filename"  name="filename" style="width: 0.1px; height: 0.1px; opacity: 0;overflow: hidden;position: absolute;z-index: -1;">
                        <label for="filename" style="cursor:pointer; text-align: center;">Select image <i class="far fa-file" style="font-size: 18px;"></i></label>
                </div>
            </form>
        </main>

        <footer class="reverse_row py-4">
            <div class="main_right reverse_row">
                <button class="black_button">Next</button>
                <button class="clear_button mr-3">Clear form</button>
            </div>
        </footer>
        <div class="background_grey">
        <main>
            <div id="box_4" style="margin: 0;">
            <h2>Step 4 - Finish</h2>
                <form action="" class="d__flex">
                    <div class="background_white main_left">
                        <h2 id="y_purchase">Your purchase</h2>
                        <div class="d__flex">
                            <img class="mr_color_image" src="" alt="" id="finish_image">
                            <div class="final_info">
                                <h4 id="final_product_name">Black Air Jordan 1 Mid </h4>
                                <div class="main_normal_text finish_padding">Size:  <b id="final_size">M</b></div>
                                <div class="main_normal_text finish_padding">Color: <div id="final_color"></div></div>
                                <div class="main_normal_text finish_padding" id="estimate">ESTIMATE DELIVERY DATE:</div>
                                <div class="main_normal_text finish_padding">Between <b id="f_date_1"></b> and <b id="f_date_2"></b> </div>
                            </div>
                        </div>

                        <!-- for checkbox input should go before label -->
                        <input type="checkbox" id="f_required_checkbox" name="terms" class="radio" id="terms">
                        <label for="terms" class="fix" id="f_conditions">I have read and accept the terms and conditions.</label><br>
                        <button class="black_button" id="f_required_buynow">Buy now</button>
                    </div>
                    <div class="background_white main_right">
                        <h3 class="grey_line">Your order</h3>
                        <div class="main_normal_text">
                            Sneackers: <b id="f_price">19.95€</b>
                        </div>
                        <div class="main_normal_text">
                            Shipping Cost: <b id = "f_shipping"></b>
                        </div>
                        <div class="grey_line"></div>
                        <div class="main_normal_text">
                            Total: <b id="f_total"></b>
                        </div>
                    </div>

                </form>
            </div>

        </main>
        </div>

    </div>
    <script src="./assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
</body>

</html>