
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
    <?php
      $db = new PDO('sqlite:news.db');
      $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
      $stmt->bindParam(':id', $_GET['id']);
      $stmt->execute();
      $article = $stmt->fetch();      
    ?>
  </head>
  <body>
    <header>
      <h1><a href="index.php">Super Legit News</a></h1>
      <h2><a href="index.php">Where fake news are born!</a></h2>
      <div id="signup">
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
      </div>
    </header>
    <nav id="menu">
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
    </nav>
    <aside id="related">
      <article>
        <h1><a href="#">Duis arcu purus</a></h1>
        <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
      </article>        
      <article>
        <h1><a href="#">Sed efficitur interdum</a></h1>
        <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
      </article>
      <article>
        <h1><a href="#">Vestibulum congue blandit</a></h1>
        <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
      </article>
    </aside>
    <section id="news">
      <article>
        <header>
          <h1>
            <?php echo '<a href="item.php?id='.$article["id"].'">'.$article["title"].'</a>';?>
          </h1>
        </header>
        <img src="https://picsum.photos/600/300?business" alt="">
        <?php
          echo '<p>';
            echo $article['introduction'];
          echo '</p>'; 
          echo '<p>';
            echo $article['fulltext'];
          echo '</p>'; 
        ?>
        <section id="comments">
          <h1><?= $article['comments']?> 5 Comments</h1>
          <article class="comment">
            <span class="user">updatespeak</span>
            <span class="date">1m</span>
            <p>Aliquam maximus commodo dui, ut viverra urna vulputate et. Donec posuere vitae sem sed vehicula. Sed in erat eu diam fringilla sodales. Aenean lacinia vulputate nisl, dignissim dignissim nisl. Nam at nibh mollis, facilisis nibh sit amet, mattis urna. Maecenas.</p>
          </article>
          <article class="comment">
            <span class="user">distortedscorpius</span>
            <span class="date">3m</span>
            <p>Duis scelerisque purus fermentum turpis euismod congue. Phasellus sit amet sem mollis, imperdiet quam porta, volutpat purus. In et sodales urna, sed cursus lectus. Vivamus a massa vitae nisl lobortis laoreet nec tristique magna. Mauris egestas ipsum eu sem lacinia.</p>
          </article>
          <article class="comment">
            <span class="user">duplicateengineer</span>
            <span class="date">7m</span>
            <p>Phasellus at neque nec nunc scelerisque eleifend eu eu risus. Praesent in nibh viverra, posuere ligula condimentum, accumsan tellus. Vivamus varius sem a mauris finibus, ac iaculis risus scelerisque. Nullam fermentum leo dui, at fermentum tellus consequat id. Pellentesque eleifend.</p>
          </article>
          <article class="comment">
            <span class="user">charityheinz</span>
            <span class="date">9m</span>
            <p>Nam at elit ut orci viverra viverra vitae dictum sapien. Morbi sed eleifend eros. Nunc fermentum, nulla id vehicula posuere, justo orci commodo urna, a blandit orci massa vitae urna. Sed commodo sollicitudin quam. Suspendisse molestie eget libero nec finibus.</p>
          </article>
          <article class="comment">
            <span class="user">plutoniumfogg</span>
            <span class="date">11m</span>
            <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
          </article>
          <form>
            <h2>Add your voice...</h2>
            <label>Username 
              <input type="text" name="username">
            </label>
            <label>E-mail
              <input type="email" name="email">
            </label>
            <label>Comment
              <textarea name="comment"></textarea>            
            </label>
            <button formaction="#" formmethod="post">Reply</button>
          </form>
        </section>
        <footer>
          <span class="author">Dominic Woods</span>
          <span class="tags"><a href="index.php">#politics</a> <a href="index.php">#economy</a></span>
          <span class="date">15m</span>
          <a class="comments" href="item.php#comments">5</a>
        </footer>
      </article>
    </section>
    <footer>
      <p>&copy; Fake News, 2022</p>
    </footer>
  </body>
</html>
