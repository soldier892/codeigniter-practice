
<h2> <?php echo $title; ?></h2>

<?php  foreach ($news as $news_item): ?>

    <h3> <?php echo $news_item['title']; ?> </h3>

    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>

    <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>" >View Article</a></p>
    <p><a href="<?php echo site_url('news/update/'.$news_item['slug']); ?>" >Update Article</a></p>
    <p><a href="<?php echo site_url('news/delete/'.$news_item['slug']); ?>" >Delete Article</a></p>

<?php endforeach; ?>
<br><br>
<a href="<?php echo site_url('news/create'); ?>" >Create News Item</a>