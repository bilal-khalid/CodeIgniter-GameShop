<div class="row details">
    <div class="col-md-4">
        <img src="<?= base_url("assets/images/products/{$product->image}") ?>" />
    </div>
    <div class="col-md-8">
        <div class="details-title">
            <h3><?= h($product->title) ?></h3>
        </div>
        <div class="details-price">
            Price: $<?= h($product->price) ?>
        </div>
        <div class="details-description">
            <?= h($product->description) ?>
        </div>

        <div class="details-buy d-inline-block">
            <form class="d-flex justify-content-center align-items-center flex-wrap" method="POST" action="<?= site_url('cart/add') ?>">
                <span>QTY:</span>
                <input class="qty m-1" type="text" name="qty" value="1">
                <input type="hidden" name="item_number" value="<?= h($product->id) ?>">
                <input type="hidden" name="price" value="<?= h($product->price) ?>">
                <input type="hidden" name="title" value="<?= h($product->title) ?>">
                <button class="btn btn-success text-nowrap" type="submit">Add To Cart</button>
            </form>
        </div>
    </div>
</div>
