
<h2> <?php echo $title; ?> </h2>

<?php echo validation_errors(); ?>


<?php if (isset($update_url))
    {
        echo form_open($update_url);
    }
    else{
        echo form_open('news/create');
    }
    ?>
    <label for="title">Title</label>
    <input type="text" name="title" value="<?php if (isset($news_item['title'])){echo $news_item['title'];} ?>"/> <br>

    <label for="title">Text</label>
    <textarea name="text"><?php if (isset($news_item['text'])){echo $news_item['text'];} ?></textarea> <br>

    <input type="submit" name="submit" value="<?php echo $title; ?>">

<?php echo form_close(); ?>

<br>
<br>
<a href="<?php echo site_url('news') ?>" >View News Items</a>
