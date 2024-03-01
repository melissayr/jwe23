<!-- <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="leistungen.html">Leistungen</a></li>
                    <li class="active"><a href="oeffnungszeiten.html">Öffnungszeiten</a></li>
                    <li><a href="kontakt.html">Kontakt</a></li>
                </ul>
            </nav> -->


            <?php

            $nav_punkte = array(
                "home" => "Startseite"
                , "leistungen" => "Leistungen"
                , "oeffnungszeiten" => "Öffnungszeiten"
                , "kontakt" => "Konakt"
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
