<div class="row">
    <?php if (count($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4 col-sm-6 game">
                <div class="game-image">
                    <a href="<?= site_url("products/details/{$product->id}") ?>">
                        <img src="<?= base_url("assets/images/products/{$product->image}") ?>" />
                    </a>
                    <div class="game-price">$<?= h($product->price) ?></div>
                </div>
                <div class="game-title">
                    <?= h($product->title) ?>
                </div>
                <div class="game-add">
                    <form class="d-flex justify-content-center align-items-center flex-wrap" method="POST" action="<?= site_url('cart/add') ?>">
                        <span>QTY:</span>
                        <input class="qty m-1" type="text" name="qty" value="1">
                        <input type="hidden" name="item_number" value="<?= h($product->id) ?>">
                        <input type="hidden" name="price" value="<?= h($product->price) ?>">
                        <input type="hidden" name="title" value="<?= h($product->title) ?>">
                        <button class="btn btn-success text-nowrap" type="submit">Add To Cart</button>
                    </form>
                </div>
            </div><!-- /.game -->
        <?php endforeach ?>
    <?php else : ?>
        <div class="col-12">
            <p>Sorry, there are no products to show!</p>
        </div>
    <?php endif ?>
</div><!-- /.row -->
