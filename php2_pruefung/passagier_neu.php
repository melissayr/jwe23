<?php


// include "funktionen.php";

// $errors = array();

// $erfolg = false;



// if (!empty($_POST)) 
// {   
//     $sql_id = escape($_POST["id"]);
//     $sql_vorname = escape( $_POST["vorname"]);
//     $sql_nachname = escape( $_POST["nachname"]);
//     $sql_geburtstag = escape( $_POST["geburtstag"]);
//     $sql_flugangst = escape( $_POST["flugangst"]);



//     if(!empty($sql_id)) {
       
          
//             $result = query("SELECT * FROM passagiere WHERE id = '{$sql_id}' "); 
          
//             $row = mysqli_fetch_assoc($result);
//             if ($row) {$errors[]="Diese Zutat existiert bereits";}
//         } 



//             query("INSERT INTO passagiere SET 
//             id = '{$sql_id}',
//             vorname = {$sql_vorname},
//             nachname = '{$sql_nachname}',
//             geburtstag = '{$sql_geburtstag}'
//             flugangst = '{$sql_flugangst}' ") ;

//             $erfolg = true;
//         }

//         if ($erfolg) {
//             echo "<p>Passagier erfolgreich angelegt. <a href='passagier_liste.php'>Zurück zur  Liste</a></p>";
//         }
   
        

        // ________________________________________________________________________________

        

include "funktionen.php";


$errors = array();

$erfolg = false;


if (!empty($_POST)) 
{
    // $sql_id = escape($_POST["id"]);
    $sql_vorname = escape( $_POST["vorname"]);
    $sql_nachname = escape( $_POST["nachname"]);
    $sql_geburtstag = escape( $_POST["geburtstag"]);
    // $sql_flugangst = escape( $_POST["flugangst"]);


    //Felder validieren
    if(empty($sql_nachname)) {
        $errors[] = "....";
        } else {

            //überprüfen ob es die zutat bereits gibt
            $result = query("SELECT * FROM passagiere WHERE nachname = '{$sql_nachname}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="!!!!";}
        } 

        if (empty($errors)) {

            if ($sql_nachname == "") {
                $sql_nachname = "NULL"; // Wenn eine Zutat keine kcal hat, setze auf NULL
            }

            if ($sql_vorname == "") {
                $sql_vorname = "NULL"; //  setze auf NULL wenn leer
            }

            if ($sql_geburtstag == "") {
                $sql_geburtstag = "NULL"; //  setze auf NULL wenn leer
            }




            query("INSERT INTO passagiere SET 
         
            vorname = '{$sql_vorname}',
            nachname = '{$sql_nachname}',
            geburtstag = '{$sql_geburtstag}'

            ") ;

            $erfolg = true;
        }
}

// id = '{$sql_id}',
// flugangst = '{$sql_flugangst}' 
  
    include "kopf.php";
    //Schleife für Fehler

    if(!empty($errors)) {
        echo "<strong>Folgender Fehler ist aufgetreten</strong><br>";
        // echo $fehlermeldungen;

        echo "<nav><ul>";
        foreach ($errors as $index => $error) {
            echo "<li>" . $error . "</li>";
            echo "<br/>";
        }
        echo "</ul></nav>";
    }
    if ($erfolg) {
        echo "<p>passagier erfolgreich angelegt. <a href='passagier_liste.php'>Zurück zur  Liste</a></p>";
    }





        // ________________________________________________________________________________



?>

    

    <form action="passagier_neu.php" method="post">
   <p>Passagier</p>

        <div>
            <lable for="vorname">Vorname:</lable>
            <input type="text" name="vorname" id="vorname" />
        </div>

        <div>
            <lable for="nachname">Nachname</lable>
            <input type="text" name="nachname" id="nachname" />
        </div>
        <div>
            <lable for="geburtstag">Geburtstag:</lable>
            <input type="text" name="geburtstag" id="geburtstag" />
        </div>

        <div class='checkbox'>
				<input type='checkbox' id='toc' name='agb' />
				<label for='toc'>Flugangst ? </label>
			</div>

        <div><button type="submit">Passagier anlegen</button></div>
    </form>

    

