
    <?php
        function getImageTag($number){
            switch($number){
            case 0:
                return "city";
                break;
            case 1:
                return "nature";
                break;
            case 2:
                return "transport";
                break;
            case 3:
                return "business";
                break;
            default:
                return "city";
                break;
            }
        }

        function generate_news($db){
            $counter = 0;
            echo '<section id="news">';
            $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                                FROM news JOIN
                                    users USING (username) LEFT JOIN
                                    comments ON comments.news_id = news.id
                                GROUP BY news.id, users.username
                                ORDER BY published DESC');
            $stmt->execute();
            $articles = $stmt->fetchAll();

            foreach($articles as $article){
                echo "<article>";
                echo '<header>';
                echo '<h1><a href="item.php?id='.$article['id'].'">' . $article['title'] . '</a></h1>';
                echo '</header>';
                echo '<img src="https://picsum.photos/600/300?';
                echo getImageTag($counter);
                if($counter >= 4){
                    $counter = 0;
                }
                else{
                    $counter++;
                }
                echo '" alt="">';
                echo '<p>' . $article['introduction'] . '</p>';
                echo '<p>' . $article['fulltext'] . '</p>';
                echo '<footer>';
                echo '<span class="author">'. $article['name'] .'</span>';
                echo '<span class="tags">';
                $tags = explode(",",$article['tags']);
                foreach($tags as $tag){
                    echo '<a href="index.php">#'. $tag .'</a> ';
                }
                echo '</span>';
                $date = date('F j', $article['published']);
                echo '<span class="date">'.$date.'</span>';
                echo '<a class="comments" href="item.php#comments">'.$article['comments'].'</a>';
                echo "</article>";
            }
            echo "</section>";
        }
       
      ?>