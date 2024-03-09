		<div id='journal'>
			<div class='wrapper'>
					<div class='row'>
						<div class='col-xs-12'>
								<h1>Zufallspasswort</h1>
						</div>
					</div>

					<div class='row'>
						<div class='col-xs-12'>
							<br>
						

			<?php

include "passwort.php";



function PASSwort() {
  for ($i = 0; $i < 10; $i++) {
	  echo randomPassword() . "<br>";
	}
}PASSwort();


			
			?>



						</div>
					</div>

			</div>
		</div>
