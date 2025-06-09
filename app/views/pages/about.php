<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead">Simple CMS built on custom MVC framework</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body bg-light">
                    <p>This is a simple CMS built using a custom MVC framework. It demonstrates the basic concepts of MVC architecture including:</p>
                    <ul>
                        <li>Models - Handle data and business logic</li>
                        <li>Views - Handle display and presentation</li>
                        <li>Controllers - Handle user requests and coordinate between models and views</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?> 