<?php

$nav_punkte = array(
    "home" => "Home"
    , "jobs" => "Jobs"
    , "ueberuns" => "Team"
    , "login" => "Login"
    , "bewerbung" => "Bewerben"
    , "faq" => "FAQ´s"
);

echo "<nav><ul>";

foreach ($nav_punkte as $href => $nav_punkt) {
    echo '<li ';
    if ($site == $href) {
        echo 'class="active"';
    }
    echo '><a href="?seite=';
    echo $href . '">' . $nav_punkt;
    echo "</a></li>" ;
  }

echo "</ul></nav>";
