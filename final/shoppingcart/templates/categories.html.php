<?php if ( isset($allCategories) ) : ?>
<ul> 
    <li><a href="?">All</a> </li>    
    <?php foreach ($allCategories as $category): ?>
        <li>
            <a href="?cat=<?php echo $category['category_id']; ?>">
                <?php echo $category['category']; ?>
            </a>
        </li>    
    <?php endforeach; ?> 
</ul>
<?php endif; ?>

        <form style="padding-left: 30px;" method="post" action="#">
        <label>Look-up:</label><br>
        
            <select style="width: 400px; height: 26px;" name="category">
            <?php foreach ($allCategories as $category): ?>
                <option 
                    value="<?php echo $allCategories['category']; ?>"
                    <?php if( intval($category) === $category['category']) : ?>
                    <?php $_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] + '?cat=' ?><?php echo $category['category_id']?>
                    <?php endif; ?>
                >
                    <?php echo $category['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input style="width: 75px; height: 26px; margin-top: -3px;" class="btn btn-default btn-xs" type="submit" value="Results" />
        </form>