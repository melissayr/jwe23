<!-- AJAX Call -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function ladeJobs() { // function zum aktualisieren der Jobs mit AJAX
            $.ajax({
                url: 'aktualisiere_jobs.php', // Datei auf dem Server, die die Jobs aktualisiert
                type: 'GET', // GET-Anfrage
                success: function(response) {
                    $('#myTable tbody').html(response); // Aktualisiere die Tabelle mit den neuen Jobs
                }
            });
        }

        // function aufrufen
        ladeJobs();

        // aktualisiere die Jobs alle 5 Sekunden
        setInterval(ladeJobs, 5000);
    });
</script>

<?php

print_r($_GET);

