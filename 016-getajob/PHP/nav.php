
<?php

$nav_punkte = array(
    "home" => "Home"
    , "jobs" => "Jobs"
    , "ueberuns" => "Team"
    , "bewerbung" => "Bewerbung"
    , "faq" => "FAQ´s"
);

echo "<nav><ul>";

foreach ($nav_punkte as $href => $nav_punkt) {
    echo '<li ';
    if (true == $href) {
        echo 'class="active"';
    }
    echo '><a href="?seite=';
    echo $href . '">' . $nav_punkt;
    echo "</a></li>" ;
  }

echo "<li><a href='admin/login.php'>Login Adminbereich</a></li></ul></nav>"; 
?>