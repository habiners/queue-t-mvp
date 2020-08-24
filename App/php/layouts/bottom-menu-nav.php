<?php 
// echo $_SERVER['REQUEST_URI'] . "hi"; 
$server = $_SERVER['REQUEST_URI'];

$homeActive = strpos($server, "home") || strpos($server, "shop"); //Checks if string is found in URL
$appointmentActive = strpos($server, "appointment");
$notificationActive = strpos($server, "notification");
$qtActive = strpos($server, "QT");
$profileActive = strpos($server, "profile") && !strpos($server, "shop");
?>
<nav class="nav">
    <a href="home.php" class="nav-link <?php if($homeActive) echo "nav-link-active";?>">
        <i class="material-icons nav-icon<?php if($homeActive) echo "-active";?>">home</i>
        
    </a>
    <a href="appointment.php" class="nav-link <?php if($appointmentActive) echo "nav-link-active";?>">
        <i class="material-icons nav-icon<?php if($appointmentActive) echo "-active";?>">event_available</i>
        
    </a>
    <a href="notification.php" class="nav-link <?php if($notificationActive) echo "nav-link-active";?>">
        <i class="material-icons nav-icon<?php if($notificationActive) echo "-active";?>">notifications</i>
        
    </a>
    <a href="QT-points.php" class="nav-link <?php if($qtActive) echo "nav-link-active";?>">
              <i class="material-icons nav-icon<?php if($qtActive) echo "-active";?>">add_shopping_cart</i>
             
            </a>
    <a href="profile.php" class="nav-link <?php if($profileActive) echo "nav-link-active";?>">
        <i class="material-icons nav-icon<?php if($profileActive) echo "-active";?>">person</i>
        
    </a>
</nav>