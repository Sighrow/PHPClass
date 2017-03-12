<h2 style="padding: 13px;">Your Shopping Cart</h2>
<?php if ( count($cart) > 0): ?>
    <table class="table table-bordered" style="width: 40%; margin-left: 15px; margin-bottom: 15px;" border="1">
      <thead>
        <tr>
          <th>Item Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
            <td>
                <strong>Total:</strong>
            </td>
            <td>
                <strong>$<?php echo number_format($total, 2); ?></strong>
            </td>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($cart as $item): ?>
          <tr>
            <td>
                <?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td>
              $<?php echo number_format($item['price'], 2); ?>
            </td>
          </tr>
        <?php endforeach; ?>
           <tr>
            <td></td>
            <td></td>
          </tr>
      </tbody>
    </table>
<?php else: ?>
<p style="padding-left: 15px;">Your cart is empty!</p>
<?php endif; ?>