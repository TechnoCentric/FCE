<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 3:15 PM
 */
?>
<h2>Create a news item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open(current_url()) ?>

<label for="title">Title</label>
<input type="input" name="title" /><br />

<label for="text">Text</label>
<textarea name="text"></textarea><br />

<input type="submit" name="submit" value="Create news item" />
<a href="./">Cancel</a>
</form>