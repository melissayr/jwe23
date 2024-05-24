<?php

// echo"<pre>";
// print_r($_POST);
// echo"</pre>";
$erfolg = false;
$fehlermeldungen = array();

//wurde das Formular abgeschickt? Wenn Ja - echo Btn wurde gedrückt
if (! empty($_POST)){
   

    // Validierung - wurde das Formular richtig ausgefüllt? Wenn empty(leer), dann führe $fehlermeldungen aus
if(empty($_POST["name"])) {
    $fehlermeldungen[] = "Bitte geben Sie Ihren Namen an.";
} elseif (strlen($_POST["name"]) <= 2) {
    //Prüfen ob der Name größer gleich 2 Buchstaben ist
    $fehlermeldungen[] = "Ihr Name ist bestimmt länger.";
}

if(empty($_POST["email"])) {
    $fehlermeldungen[] = "Bitte geben Sie Ihre E-mail an."; 
} elseif (!preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,15}$/", $_POST["email"])) { //REGEX!! (^ heisst beginn)  - preg_match ist funktion in php mit der man RegEx ausdrücke prüfen kann //!preg_match = wenn es nicht dieser form entspricht, dann $fehlermeldungen
    $fehlermeldungen[] = "Bitte prüfen Sie ihre Email.";
}


if(!empty($_POST["prueffeld"])) {
    $fehlermeldungen[] = "Lassen Sie dieses Feld bitte leer. Sie sind bestimmt ein Roboter!"; 
}

if(empty($_POST["message"])) {
    $fehlermeldungen[] = "Bitte geben Sie Ihre Nachricht ein."; 
}


//Wennn keine Fehlermeldungen aufgetreten sind
if(empty($fehlermeldungen)) {
    $erfolg = true;

    $mail_inhalt = "Anfrage über Kontaktformular:
        
    Namen: {$_POST["name"]}
    Email: {$_POST["email"]}
    Nachricht: {$_POST["message"]}

    IP: {$_SERVER["REMOTE_ADDR"]}
    ";
    
    //TESTWEISE INHALT IM BROWSER AUSGEBEN
    // echo"<pre>";
    // print_r($mail_inhalt);
    // echo"</pre>";



    //Anfrage in Datein am Server Speichern (als backup)
    $dateiname = "mail_".date("Y-m-d_H-i-s"); // MIT DATE WIRD DER NAME INDIVIDUELL GEGEBEN UND SOMIT WIRD DATEI NICHT ÜBERSCHRIEBEN (TIMESTEMP) (oder DATEINAME UMBENENNEN)
    file_put_contents("mailbackup/{$dateiname}.txt", $mail_inhalt);

    // $inahlt = file_get_contents('PFAD')


    //email 
    mail("support@wifi.at", //Empfänger
    "Webseiten-Kontaktformular-Anfrage von {$_POST["name"]}", //Betreff
    $mail_inhalt //Email Nachricht
    );
   }
}

?>
 

<div class="text">
                <h1>Kontakt</h1>
                <div class="left">
                    <h2>Wifi Salzburg</h2>
                    <p>
                        Musterhausstraße 13<br />
                        5020 Salzburg<br />
                        Österreich<br />
                        <br />
                        0043-662-12345<br />
                        <a href="mailto:rainer.christian@gmx.at">rainer.christian@gmx.at</a><br />
                        <a href="http://www.wifisalzburg.at" target="_blank">www.wifisalzburg.at</a><br />
                        <br />
                        <br />
                        Oder einfach Formular ausfüllen, abschicken, fertig!<br />
                        Wir werden uns umgehend um Ihr Anliegen bemühen.
                    </p>
                </div>
                <div class="contact right">
                
                <?php 
                if(!empty($fehlermeldungen)) {
                    echo "<strong>Folgender Fehler ist aufgetreten</strong><br>";
                    // echo $fehlermeldungen;

                    echo "<nav><ul>";
                    foreach ($fehlermeldungen as $index => $fehlermeldung) {
                        echo "<li>" . $fehlermeldung . "</li>";
                        echo "<br/>";
                    }

                    echo "</ul></nav>";
                }


                //erfolgsmeldung ausgeben wenn zb Bewerbung abgeschickt wurde
                if ($erfolg){
                    echo "<h3>Vielen Dank für Ihre Anfrage!</h3>";
                } else { ?>

                    <form action="" method = "post">
                        <div>
                            <input type="text" id="name" name="name" value="<?php 
                            if (!empty($_POST["name"])  )   {
                            echo htmlspecialchars($_POST["name"]); //htmlspecialchars - Zeichen wie / &^^... " das diese richtig angezeigt werden
                            }?>" placeholder="Namen"/>
                        </div>
                        <div>
                            <input type="email" id="email" name="email" value="<?php // Type email prüft automatisch ob @ dabei ist
                            if (!empty($_POST["email"])  )   {
                            echo htmlspecialchars($_POST["email"]); //htmlspecialchars - Zeichen wie / $ " das diese richtig angezeigt werden
                            }?>" placeholder="E-mail" />
                        </div>

                        <div>
                        <input type="text" id="prueffeld" name="prueffeld" value="" placeholder="Diese Zeile leer lassen"> </div>
                      
                        <div>
                            <textarea id="message" name="message" value="<?php 
                            if (!empty($_POST["message"])  )   {
                            echo htmlspecialchars($_POST["message"]); //htmlspecialchars - Zeichen wie / $ " das diese richtig angezeigt werden
                            }?>" placeholder="Ihre Nachricht"></textarea>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" id="submit" name="submit">Absenden</button>
                        </div>
                    </form>
                    <?php } // Schliessende klammer von erfolgsmeldung // ENTWEDER FORMULAR IST DA, ODER WENN ABGESCHICKT WURDE DANN KOMMT NUR NOCH DIE $erfolg NACHRICHT! ?> 
                </div>
                <div class="clear"></div>
                </div>

           