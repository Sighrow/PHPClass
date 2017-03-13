<form style="padding-left: 28px;" method="post" action="#">      
    <b>Show:</b> <select style="width: 270px; height: 26px;" name="categoryselected">

        <option value="">All</option>

        <?php foreach ($allCategories as $category): ?>
            <option value="<?php echo $category['category_id']; ?>"
            <?php if (intval($catID) === $category['category_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                    >
                        <?php echo $category['category']; ?>
            </option>
        <?php endforeach; ?>


    </select>

    <input style="width: 75px; height: 26px; margin-top: -3px;" class="btn btn-default btn-xs" type="submit" value="Results" />
</form>