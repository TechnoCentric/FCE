<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 12:31 PM
 */
foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div class="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="<?php echo current_url() . '/' . $news_item['slug'] ?>">View article</a></p>

<?php endforeach ?>