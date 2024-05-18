<<<<<<< Updated upstream
// Hier sind die functions für die Hamburger navigation 

$(document).ready(function() {
    const menuIcon = $("#menu-icon");
    const slideoutMenu = $("#slideout-menu");
    const searchIcon = $("#search-icon");
    const searchBox = $("#searchbox");
  
    searchIcon.click(function() {
      if (searchBox.css("top") === '72px') {
        searchBox.css("top", '24px');
        searchBox.css("pointer-events", 'none');
      } else {
        searchBox.css("top", '72px');
        searchBox.css("pointer-events", 'auto');
      }
    });
  
    menuIcon.click(function() {
      if (slideoutMenu.css("opacity") === "1") {
        slideoutMenu.css("opacity", '0');
        slideoutMenu.css("pointer-events", 'none');
      } else {
        slideoutMenu.css("opacity", '1');
        slideoutMenu.css("pointer-events", 'auto');
      }
    });
  });
  
// Hier kommt die select job function

  $(document).ready(function() {
    // Function Eingabewert Filtern
    $("#myInput").on("keyup", function() {
      const input = $(this).val().toUpperCase();
      const table = $("#myTable");
      const tr = table.find("tr");
  
      // Loop läuft durch alle Tabellenzeilen und versteckt die nicht der Eingabe entsprechen
      tr.each(function() {
        const td = $(this).find("td:first-child");
        if (td.length > 0) {
          const txtValue = td.text() || td.html();
          if (txtValue.toUpperCase().indexOf(input) > -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        }
      });
    });
  });
  

=======
// Hier sind die functions für die Hamburger navigation 

$(document).ready(function() {
    const menuIcon = $("#menu-icon");
    const slideoutMenu = $("#slideout-menu");
    const searchIcon = $("#search-icon");
    const searchBox = $("#searchbox");
  
    searchIcon.click(function() {
      if (searchBox.css("top") === '72px') {
        searchBox.css("top", '24px');
        searchBox.css("pointer-events", 'none');
      } else {
        searchBox.css("top", '72px');
        searchBox.css("pointer-events", 'auto');
      }
    });
  
    menuIcon.click(function() {
      if (slideoutMenu.css("opacity") === "1") {
        slideoutMenu.css("opacity", '0');
        slideoutMenu.css("pointer-events", 'none');
      } else {
        slideoutMenu.css("opacity", '1');
        slideoutMenu.css("pointer-events", 'auto');
      }
    });
  });
  
// Hier kommt die select job function

  $(document).ready(function() {
    // Function Eingabewert Filtern
    $("#myInput").on("keyup", function() {
      const input = $(this).val().toUpperCase();
      const table = $("#myTable");
      const tr = table.find("tr");
  
      // Loop läuft durch alle Tabellenzeilen und versteckt die nicht der Eingabe entsprechen
      tr.each(function() {
        const td = $(this).find("td:first-child");
        if (td.length > 0) {
          const txtValue = td.text() || td.html();
          if (txtValue.toUpperCase().indexOf(input) > -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        }
      });
    });
  });
  

>>>>>>> Stashed changes
