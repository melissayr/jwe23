<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
  crossorigin="anonymous">
<!-- Link zum css -->



<link rel="stylesheet" href="style.css">
  
<!-- Bootstrap css -->
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>

<!--Material css-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



<title>Get a Job Abschlussprüfung</title>

    <!-- Hier kommt der header mit einer Navbar mit einem Logo von Logoipsum -->
    
    <!-- Slideout Hamburger navigation -->

    <div id="slideout-menu">

        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="jobs.html">Jobs</a>
            </li>
            <li>
                <a href="ueberuns.html">Team</a>
            </li>
            <li>
                <a href="login.html">Login</a>
            </li>
            <li>
                <a href="bewerbung.html">Bewerben</a>
            </li>
            <li>
                <a href="faq.html">FAQ´s</a>
            </li>
           
        </ul>
    </div>

    <nav>
        <div id="logo-img">
            <a href="#">
                <img src="../logo/logo_orange.svg" alt="headerLogo">
            </a>
            <p class="slogan"><bold>Getajob</bold> <br> Find your passion</p>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="jobs.html">Jobs</a>
            </li>
            <li>
                <a href="ueberuns.html">Team</a>
            </li>
            <li>
                <a href="login.html">Login</a>
            </li>
            <li>
                <a href="bewerbung.html">Bewerben</a>
            </li>
            <li>
                <a href="faq.html">FAQ´s</a>
            </li>
            <li>
              
            </li>
        </ul>
    </nav>


<?php include "nav.php"; ?>

<!-- Javascript für die burger nav-->
<script>

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
</script>