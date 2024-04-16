<?php
include "kopf.php";




?>







    <h1>Loginbereich</h1>

    <div id="post-container">

    <form action="login.php" method="post">
        <div>
            <lable for="benutzername">Benutzername:</lable>
            <input type="text" name="benutzername" id="benutzername" />
        </div>

        <div>
            <lable for="passwort">Passwort:</lable>
            <input type="password" name="passwort" id="passwort" />
        </div>

        <div><button type="submit">Einloggen</button></div>
    </form>
  
        
              


<!-- Hier ist die Card von UIVERSE.io  -->
        <!-- <form class="form">
            <p class="form-title">Melde dich als Unternehmen an</p>
             <div class="input-container">
               <input type="email" placeholder="Gebe deine Email ein">
               <span>
               </span>
           </div>
           <div class="input-container">
               <input type="password" placeholder="Gebe dein Passwort ein">
             </div>
              <button type="submit" class="submit">
             Anmelden
           </button>
        </form> -->

    </div>
</main>

<?php
include "fuss.php";

?>

