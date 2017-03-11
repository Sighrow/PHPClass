<?php if ( isset($errors) && is_array($errors) ) : ?>
<ul style="list-style-image: url(images/erroricon.png);">
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>