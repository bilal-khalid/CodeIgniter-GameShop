<?php if ($this->cart->total_items()) : ?>
    <div class="cart-block">
        <form action="cart/update" method="post">
            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
                <tr>
                    <th>QTY</th>
                    <th>Item Description</th>
                    <th style="text-align:right">Item Price</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $item) : ?>
                    <input type="hidden" name="<?php echo $i.'[rowid]'; ?>" value="<?php echo $item['rowid']; ?>" />
                        <tr>
                            <td>
                                <input type="text" name="<?php echo $i.'[qty]'; ?>" value="<?php echo $item['qty']; ?>" maxlength="3" size="5" class="qty" />
                            </td>
                            <td>
                                <?php echo $item['name']; ?>
                            </td>
                            <td style="text-align:right">
                                $<?php echo $this->cart->format_number($item['price']); ?>
                            </td>
                        </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right" style="text-align:right">
                        $<?php echo $this->cart->format_number($this->cart->total()); ?>
                    </td>
                </tr>
            </table>
            <br>
            <p class="m-0">
                <button class="btn btn-light" type="submit">Update Cart</button>
                <a class="btn btn-light" href="<?= site_url('cart') ?>">Go To Cart</a>
            </p>
        </form>
    </div>
<?php endif ?>

<div class="card mb-4">
    <div class="card-header text-white bg-dark">
        Categories
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach (get_categories() as $category) : ?>
            <li class="list-group-item">
                <a class="text-muted" href="<?= site_url("products/category/{$category->id}") ?>">
                    <?= $category->name ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<div class="card mb-4">
    <div class="card-header">
        Most Popular
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach (get_popular() as $product) : ?>
            <li class="list-group-item">
                <a class="text-muted" href="<?= site_url("products/details/{$product->id}") ?>">
                    <?= $product->title ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
