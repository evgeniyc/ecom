<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('items/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="descr">Description</label>
    <textarea name="descr"></textarea><br />

    <input type="submit" name="submit" value="Create item" />

</form>