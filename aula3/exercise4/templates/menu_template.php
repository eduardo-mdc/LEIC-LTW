<?php 
    function generate_menu(){
        echo 
        '<nav id="menu">
        <!-- just for the hamburguer menu in responsive layout -->
        <input type="checkbox" id="hamburger"> 
        <label class="hamburger" for="hamburger"></label>
  
        <ul>
          <li><a href="index.php">Local</a></li>
          <li><a href="index.php">World</a></li>
          <li><a href="index.php">Politics</a></li>
          <li><a href="index.php">Sports</a></li>
          <li><a href="index.php">Science</a></li>
          <li><a href="index.php">Weather</a></li>
        </ul>
      </nav>';
    }
?>