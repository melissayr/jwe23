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
  



  // Hier kommt das selektieren der Job Liste

$(document).ready(function() {
  $("#jobSearchInput").on("keyup", function() {
    const input = $(this).val().toUpperCase();
    const table = $("#myTable");
    const tr = table.find("tr");
// durchsuch meinen table um Jobs zu filtern
    tr.each(function() {
      const td = $(this).find("td");
      if (td.length > 0) {
        const jobDescription = td.eq(1).text().toUpperCase();
        const jobTitle = td.eq(2).text().toUpperCase();
        const qualifikation = td.eq(3).text().toUpperCase();
        const dienstort = td.eq(4).text().toUpperCase();
        const suchBegriffe = jobDescription + jobTitle + qualifikation + dienstort;

        if (suchBegriffe.indexOf(input) > -1) {
          $(this).show(); //zeigt das gesuchte an
        } else {
          $(this).hide(); //versteckt, wenn das suchergebnis nicht zutrifft
        }
      }
    });
 });
});


