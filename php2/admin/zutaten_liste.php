<?php

include "funktionen.php"

include "kopf.php";

?>

<h1>Zutaten</h1>

<?php

$result = mysqli_query($db, "SELECT * FROM zutaten");

print_r($result);

?>

<?php

include "fuss.php";

?>