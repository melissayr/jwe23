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
  

