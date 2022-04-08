<?php

    function generate_article($db){
        $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $article = $stmt->fetch();   
        ?>
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
      <?php
    }

?>