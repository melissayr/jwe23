<div class='wrapper'>
	<div class='row'>
		<div class='col-xs-12'>
			<h1>Registrierung</h1>
		</div>
	</div>
</div>




<?php

$erfolg = false;
$fehlermeldungen = array();

//wurde das Formular abgeschickt? Wenn Ja - echo Btn wurde gedrückt

if (! empty($_POST)){
   


			//Benutzername
			if(empty($_POST["benutzername"])) {
				$fehlermeldungen[] = "Bitte geben Sie Ihren Benutzernamen ein.";
			} elseif ((strlen($_POST["benutzername"]) < 4) /*&& (!preg_match("^(?=.*[a-z0-9]){4}$"))*/) { //Hab die Regex Kombination aus stackoverflow.com
				//Prüfen ob der Name größer gleich 2 Buchstaben ist
				$fehlermeldungen[] = "Ihr Benutzername muss mindestens aus 4 Zeichen bestehen. Es sind keine Sonderzeichen erleubt.";
			}


			//Passwort
			if(empty($_POST["passwort"])) {
				$fehlermeldungen[] = "Bitte geben Sie ein Passwort ein."; 
			} elseif ((strlen($_POST["passwort"]) < 6) && (!preg_match("^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$^", $_POST["passwort"]))) {  //Hab die Regex Kombination aus stackoverflow.com
				$fehlermeldungen[] = "Ihr Passwort muss mindestens aus 6 Zeichen bestehen, mindstens einem Buchstaben, einer Zahl und ein Sonderzeichen.";
			}

			//Email
			if(empty($_POST["email"])) {
				$fehlermeldungen[] = "Bitte geben Sie Ihre E-mail an."; 
			} elseif (!preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,15}$/", $_POST["email"])) { //REGEX!! (^ heisst beginn)  - preg_match ist funktion in php mit der man RegEx ausdrücke prüfen kann //!preg_match = wenn es nicht dieser form entspricht, dann $fehlermeldungen
				$fehlermeldungen[] = "Bitte prüfen Sie ihre Email auf Vollstädigkeit.";
			}

			//AGB

			if(!empty($_POST['checkbox'])){
				$fehlermeldungen[] = "Bitte akzeptiere die AGB´s.";
			}



			//Wennn keine Fehlermeldungen aufgetreten sind
			if(empty($fehlermeldungen)) {
				$erfolg = true;

				$inhalt = "Registrierung:
					
				Benutzername: {$_POST["benutzername"]}
				Email: {$_POST["email"]}
				Passowrt: {$_POST["passwort"]}
				";


				//Anfrage in Datein am Server Speichern (als backup)
				$dateiname = "registrierung_".date("Y-m-d_H-i-s"); //(TIMESTEMP) 
				file_put_contents("registrierungen/{$dateiname}.txt", $inhalt);

			}
}

?>


<?php 
                if(!empty($fehlermeldungen)) {
                    echo "<strong>Folgender Fehler ist aufgetreten</strong><br>";

                    echo "<nav><ul>";
                    foreach ($fehlermeldungen as $index => $fehlermeldung) {
                        echo "<li>" . $fehlermeldung . "</li>";
                        echo "<br/>";
                    }

                    echo "</ul></nav>";
                }

                if ($erfolg){
                    echo "<h3>Vielen Dank für Ihre Registrierung!</h3>";
                } else { 
					
?>


<form id='register-form' method="post" action="index.php?seite=registrieren">
	<div class="wrapper">
		<div class='row'>
			<div class='col-xs-12 col-sm-12'>
				<label for='username'>Benutzername</label>
				<input type='text' id='username' name='benutzername' value="<?php 
                            if (!empty($_POST["benutzername"])  )   {
                            echo htmlspecialchars($_POST["benutzername"]); //htmlspecialchars - Zeichen wie / &^^... " das diese richtig angezeigt werden
                            }?>" />
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='password'>Passwort</label>
				<input type='password' id='password' name='passwort' />
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='email'>E-Mail</label>
				<input type='text' id='email' name='email' />
			</div>
			<div class='col-xs-12 col-sm-12'>
				<input type='checkbox' id='toc' name='agb' />
				<label for='toc'>Ich akzeptiere die AGB.</label>
			</div>
			<div class='col-xs-12'>
				<input type='submit' value='Registrieren' />
			</div>
		</div>
	</div>
</form>


<?php } ?>