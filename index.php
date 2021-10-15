<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", Arial, Helvetica, sans-serif
    }
</style>

<body class="w3-light-grey">

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            /* Full-width input fields */
            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%;
                /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }

                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>

        <h2>Modal Login Form</h2>



        <div id="id01" class="modal">
            <?php
            $title = 'User Login';

            require_once 'db/user.php';

            //If data was submitted via a form POST request, then...
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $login = strtolower(trim($_POST['login']));
                $password = $_POST['psw'];
                $new_password = md5($password . $login);

                $result = $user->getUser($login, $new_password);
                if (!$result) {
                    echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
                } else {
                    $_SESSION['login'] = $login;
                    $_SESSION['userid'] = $result['id'];
                    echo '<div class="alert alert-success">Congrats! You can now log in using your username and password</div>';
                }
            }
            ?>

            <form class="modal-content animate" action="" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="uploads/1789654123.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="user" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" name="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

    </body>

    </html>


    <!-- Navigation Bar -->
    <div class="w3-bar w3-white w3-large w3-top w3-light-grey">
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-red w3-theme-d4 w3-hover-white w3-large w3-theme-d2"><i class="fa fa-home w3-margin-right"></i>VVA</a>
        <a href="#rooms" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Rooms</a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">About</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Contact</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Reservations</a>
        <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
            <img src="uploads/blank.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
        </a>
    </div>





    <!-- Header -->
    <header class="w3-display-container w3-content" style="max-width:1500px;">
        <img class="w3-image" src="uploads/1789654123.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
        <div class="w3-display-left w3-padding w3-col l6 m8">
            <div class="w3-container w3-red">
                <h2><i class="fa fa-bed w3-margin-right"></i>VVA</h2>
            </div>
            <div class="w3-container w3-white w3-padding-16">
                <form action="/action_page.php" target="_blank">
                    <div class="w3-row-padding" style="margin:0 -16px;">
                        <div class="w3-half w3-margin-bottom">
                            <label><i class="fa fa-calendar-o"></i> Check In</label>
                            <input class="w3-input w3-border" type="week" id="week" name="week" required>
                        </div>
                        <div class="w3-half">
                            <label><i class="fa fa-calendar-o"></i> Type</label>
                            <select class="w3-input w3-border" name="type" id="type">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </div>
                    <div class="w3-row-padding" style="margin:8px -16px;">
                        <div class="w3-half w3-margin-bottom">
                            <label><i class="fa fa-male"></i> Adults</label>
                            <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">
                        </div>
                        <div class="w3-half">
                            <label><i class="fa fa-child"></i> Where</label>
                            <select class="w3-input w3-border" name="where" id="where">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </div>
                    <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Page content -->
    <div class="w3-content" style="max-width:1532px;">

        <div class="w3-container w3-margin-top" id="rooms">
            <h3>Rooms</h3>
            <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
        </div>

        <div class="w3-row-padding">
            <div class="w3-col m3">
                <label><i class="fa fa-calendar-o"></i> Check In</label>
                <input class="w3-input w3-border" type="week" id="week" name="week" required>
            </div>
            <div class="w3-col m3">
                <label><i class="fa fa-calendar-o"></i> Type</label>
                <select class="w3-input w3-border" name="type" id="type">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </div>
            <div class="w3-col m2">
                <label><i class="fa fa-male"></i> Adults</label>
                <input class="w3-input w3-border" type="number" placeholder="1">
            </div>
            <div class="w3-col m2">
                <label><i class="fa fa-child"></i> where</label>
                <select class="w3-input w3-border" name="type" id="type">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </div>
            <div class="w3-col m2">
                <label><i class="fa fa-search"></i> Search</label>
                <button class="w3-button w3-block w3-black">Search</button>
            </div>
        </div>

        <div class="w3-row-padding w3-padding-16">
            <div class="w3-third w3-margin-bottom">
                <img src="uploads/1789654123.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Single Room</h3>
                    <h6 class="w3-opacity">From $99</h6>
                    <p>Single bed</p>
                    <p>15m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom">Choose Room</button>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="uploads/1789654123.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Double Room</h3>
                    <h6 class="w3-opacity">From $149</h6>
                    <p>Queen-size bed</p>
                    <p>25m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom">Choose Room</button>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="uploads/1789654123.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Deluxe Room</h3>
                    <h6 class="w3-opacity">From $199</h6>
                    <p>King-size bed</p>
                    <p>40m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom">Choose Room</button>
                </div>
            </div>
        </div>

        <div class="w3-row-padding" id="about">
            <div class="w3-col l4 12">
                <h3>About</h3>
                <h6>Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
                <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
            </div>
            <div class="w3-col l8 12">
                <!-- Image of location/map -->
                <img src="uploads/1789654123.jpg" class="w3-image w3-greyscale" style="width:100%;">
            </div>
        </div>

        <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
            <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i> 423 alle des vigne, massy Fr</div>
            <div class="w3-third"><i class="fa fa-phone w3-text-red"></i> Phone: +00 151515</div>
            <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: lesvacances@vva.com</div>
        </div>

        <div class="w3-panel w3-red w3-leftbar w3-padding-32">
            <h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i> On demand, we can offer playstation, babycall, children care, dog equipment, etc.</h6>
        </div>

        <div class="w3-container">
            <h3>Our Hotels</h3>
            <h6>You can find our hotels anywhere in the world:</h6>
        </div>

        <div class="w3-row-padding w3-padding-16 w3-text-white w3-large">
            <div class="w3-half w3-margin-bottom">
                <div class="w3-display-container">
                    <img src="uploads/1789654123.jpg" alt="Cinque Terre" style="width:100%">
                    <span class="w3-display-bottomleft w3-padding">Cinque Terre</span>
                </div>
            </div>
            <div class="w3-half">
                <div class="w3-row-padding" style="margin:0 -16px">
                    <div class="w3-half w3-margin-bottom">
                        <div class="w3-display-container">
                            <img src="uploads/1789654123.jpg" alt="les montagne" style="width:100%">
                            <span class="w3-display-bottomleft w3-padding">Les Alples</span>
                        </div>
                    </div>
                    <div class="w3-half w3-margin-bottom">
                        <div class="w3-display-container">
                            <img src="uploads/1789654123.jpg" alt="San Francisco" style="width:100%">
                            <span class="w3-display-bottomleft w3-padding">the holidays</span>
                        </div>
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px">
                    <div class="w3-half w3-margin-bottom">
                        <div class="w3-display-container">
                            <img src="uploads/1789654123.jpg" alt="Pisa" style="width:100%">
                            <span class="w3-display-bottomleft w3-padding">beach</span>
                        </div>
                    </div>
                    <div class="w3-half w3-margin-bottom">
                        <div class="w3-display-container">
                            <img src="uploads/1789654123.jpg" alt="Paris" style="width:100%">
                            <span class="w3-display-bottomleft w3-padding">Fox</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin:32px 0;">
            <h2>Get the best offers first!</h2>
            <p>Join our newsletter.</p>
            <label>E-mail</label>
            <input class="w3-input w3-border" type="text" placeholder="Your Email address">
            <button type="button" class="w3-button w3-red w3-margin-top">Subscribe</button>
        </div>

        <div class="w3-container" id="contact">
            <h2>Contact</h2>
            <p>If you have any questions, do not hesitate to ask them.</p>
            <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Parid, FR<br>
            <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +00 0123456789<br>
            <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: lesvacances@vva.com<br>
            <form action="/action_page.php" target="_blank">
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
                <p><button class="w3-button w3-black w3-padding-large" type="submit">SEND MESSAGE</button></p>
            </form>
        </div>

        <!-- End page content -->
    </div>

    <!-- Footer -->
    <footer class="w3-padding-32 w3-black w3-center w3-margin-top">
        <h5>Find Us On</h5>
        <div class="w3-xlarge w3-padding-16">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>

    <!-- Add Google Maps -->
    <script>
        function myMap() {
            myCenter = new google.maps.LatLng(41.878114, -87.629798);
            var mapOptions = {
                center: myCenter,
                zoom: 12,
                scrollwheel: false,
                draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>

</html>