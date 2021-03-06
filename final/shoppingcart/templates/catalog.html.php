<div style="padding: 15px; margin-bottom: 35px;">
    <h2 style="margin-bottom: 20px;">Shop</h2>
<table class="table table-bordered" style="width: 100%;" border="1">
    <thead>
      <tr>
          <th>Preview</th>
        <th>Product Name</th>
        <th style="width: 25%">Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $item): ?>
        <tr>
            <td><img style="width: 100px; height: 100px;" src="../access/uploads/<?php echo $item['image']; ?>"></img></td>
          <td><?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td style="width: 25%">
            $<?php echo number_format($item['price'], 2); ?>
          </td>
          <td>
            <form action="" method="post">
              <div>
                <input type="hidden" name="id" value="<?php echo $item['product_id']; ?>">
                <input class="btn btn-default btn-sm" type="submit" name="action" value="Buy">
              </div>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>
</div>