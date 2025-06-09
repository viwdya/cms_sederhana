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
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo isset($_SESSION['user_username']) ? $_SESSION['user_username'] : 'User'; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], '/users/login') !== false ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                    </li>
                    <li class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], '/users/register') !== false ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav> 