<?php if ( isset($errors) && is_array($errors) ) : ?>
<ul style="list-style-image: url(erroricon.png); margin-left: 8px;">
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>