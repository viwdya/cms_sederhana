<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?php echo URLROOT; ?>">CMS Sederhana</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/cms_sederhana/' ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/">Home</a>
                </li>
                <li class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], '/posts') !== false ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/posts">Posts</a>
                </li>
                <li class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], '/pages/about') !== false ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 