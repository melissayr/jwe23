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
}

if(empty($_POST["message"])) {
    $fehlermeldungen[] = "Bitte geben Sie Ihre Nachricht ein."; 
}


if(empty($fehlermeldungen)) {

    $erfolg = true;
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
                            echo htmlspecialchars($_POST["name"]); //htmlspecialchars - Zeichen wie / $ " das diese richtig angezeigt werden
                            }?>" placeholder="Namen"/>
                        </div>
                        <div>
                            <input type="text" id="email" name="email" value="<?php 
                            if (!empty($_POST["email"])  )   {
                            echo htmlspecialchars($_POST["email"]); //htmlspecialchars - Zeichen wie / $ " das diese richtig angezeigt werden
                            }?>" placeholder="E-mail" />
                        </div>
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
                    <?php } // ENTWEDER FORMULAR IST DA, ODER WENN ABGESCHICKT WURDE DANN KOMMT NUR NOCH DIE $erfolg NACHRICHT! ?> 
                </div>
                <div class="clear"></div>
                </div>
           