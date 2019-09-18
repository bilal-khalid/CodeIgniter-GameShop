<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url() ?>">GameShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mr-auto mt-2 mb-3 mt-lg-0 mb-lg-0">
                <li class="nav-item <?= $this->uri->uri_string() === '' || $this->uri->uri_string() === 'products' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= site_url() ?>">Home</a>
                </li>
                <?php if (!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item <?= $this->uri->uri_string() === 'users/register' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= site_url('users/register') ?>">Create Account</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item <?= $this->uri->uri_string() === 'cart' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= site_url('cart') ?>">Cart</a>
                    </li>
                <?php endif ?>
            </ul>
            <?php if (!$this->session->userdata('logged_in')) : ?>
                <form class="form-inline mb-2 mb-lg-0" method="POST" action="<?= base_url('users/login') ?>">
                    <label class="sr-only" for="loginUsername">Username</label>
                    <input type="text" class="form-control mb-2 mb-sm-0 mr-sm-2" id="loginUsername" 
                        name="username" placeholder="Username" required>
                    <label class="sr-only" for="loginPassword">Password</label>
                    <input type="password" class="form-control mb-2 mb-sm-0 mr-sm-2" id="loginPassword" 
                        name="password" placeholder="Password" required>
                    <button type="submit" class="btn btn-light">Login</button>
                </form>
            <?php else : ?>
                <!-- <form class="form-inline mb-2 mb-lg-0" method="POST" action="<?= base_url('users/logout') ?>">
                    <button type="submit" class="btn btn-light">Logout</button>
                </form> -->
                <a href="<?= base_url('users/logout') ?>" class="btn btn-light mb-2 mb-lg-0">Logout</a>
            <?php endif ?>
        </div>
    </div>
</nav>
