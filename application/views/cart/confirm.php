<?php if($cart_details) : ?>
    <p><strong>Thank you for your order.</strong></p><br>
    <table class="table table-striped">
        <tr>
            <th>Quanity</th>
            <th>Item Title</th>
            <th style="text-align:right">Item Price</th>
        </tr>
        <?php $i = 0; ?>
        <?php foreach ($cart_details['items'] as $item): ?>
            <tr>
                <td><?= $item['qty']; ?></td>
                <td><?= $item['name']; ?></td>
                <td style="text-align:right"><?= $this->cart->format_number($item['price']); ?></td>
            </tr>
            <input type="hidden" name="items[<?= $i ?>][item_name]" value="<?= $item['name'] ?>" />
            <input type="hidden" name="items[<?= $i ?>][item_id]" value="<?= $item['id'] ?>" />
            <input type="hidden" name="items[<?= $i ?>][item_qty]" value="<?= $item['qty'] ?>" />
            <?php $i++; ?>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td class="right"><strong>Shipping</strong></td>
            <td class="right" style="text-align:right"><?= $cart_details['shipping'];?></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"><strong>Tax</strong></td>
            <td class="right" style="text-align:right"><?= $cart_details['tax'];?></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"><strong>Total</strong></td>
            <td class="right" style="text-align:right">
                <strong>$<?= $this->cart->format_number($cart_details['total']); ?></strong>
            </td>
        </tr>
    </table>
<?php endif ?>