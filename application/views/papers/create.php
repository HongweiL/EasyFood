<?php echo validation_errors(); ?>
<?php echo form_open('papers/create'); ?>
<label for="title"> Title</label>
<input type="text" name="title" /><br>
<label for="slug">Slug</label>
<input type="text" name="slug" />
