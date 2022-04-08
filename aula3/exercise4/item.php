<?php
  if(is_null($_GET['id'])){
    header("Location: index.php");
    die();
  } 
  $db = new PDO('sqlite:news.db');
  require_once("templates/header_template.php");
  require_once("templates/menu_template.php");
  require_once("templates/related_template.php");
  require_once("templates/footer_template.php");
  require_once("templates/article_template.php");
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Super Legit News</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="layout.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
    <link href="comments.css" rel="stylesheet">
    <link href="forms.css" rel="stylesheet">
  </head>
  <body>
    <?php
      generate_header();
      generate_menu();
      generate_related();
    ?>
    <section id="news">
      <?php
        generate_article($db);
      ?>
    </section>
    <footer>
      <p>&copy; Fake News, 2022</p>
    </footer>
  </body>
</html>
