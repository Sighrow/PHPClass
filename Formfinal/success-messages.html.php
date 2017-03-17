<?php if ( isset($results) ) : ?>
<ul style="list-style-image: url(successicon.png); margin-left: -15px;">
    <?php foreach ($successes as $success): ?>
        <li><?php echo $success; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>