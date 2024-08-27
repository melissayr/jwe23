$(document).ready(function() {
    $('#buch-formular').submit(function(e) {
        e.preventDefault(); //autom. abschicken wird verhindert. Erst nach submit Klick

        const form_data = $(this).serialize(); //alle Eingabefelder werden in einen String zusammenfassend umgewandelt->einfacher an server senden

        $.post('index.php', form_data, function(data) {
            alert(data); //Rückmeldung des PHP-Skript
            location.reload(); // Lädt die Seite neu, um die Bücherliste zu aktualisieren
        });
    });
});
