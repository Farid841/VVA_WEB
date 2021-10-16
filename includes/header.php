<?php //This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php';
var_dump($result);
?>


<!DOCTYPE html>
<html>
<title>VVA - <?php echo $title ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php //call css file php
require_once('includes/css.php');

var_dump($_SESSION);

?>

<body>



    <!-- Navigation Bar -->
    <div class="w3-bar w3-white w3-large w3-top w3-light-grey">
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-red w3-theme-d4 w3-hover-white w3-large w3-theme-d2"><i class="fa fa-home w3-margin-right"></i>VVA</a>
        <a href="#rooms" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Rooms</a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">About</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Contact</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Reservations</a>
        <?php
        if (!isset($_SESSION['login'])) {
        ?>
            <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
                <img src="uploads/blank.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
            </a>
        <?php } else { ?>
            <a class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            <a class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>
        <?php } ?>

    </div>

    <?php //apple du fichier d'authentification 
    include('login.php');
    ?>