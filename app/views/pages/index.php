<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?php echo SITENAME; ?></h1>
            <p class="lead">Simple CMS built on custom MVC framework</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($data['posts'] as $post) : ?>
                    <div class="card card-body mb-3">
                        <h4 class="card-title"><?php echo $post->title; ?></h4>
                        <div class="bg-light p-2 mb-3">
                            Posted on <?php echo $post->created_at; ?>
                        </div>
                        <p class="card-text"><?php echo substr($post->content, 0, 200) . '...'; ?></p>
                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->id; ?>" class="btn btn-dark">Read More</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <div class="card card-body mb-3">
                    <h4>Quick Links</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo URLROOT; ?>/posts">All Posts</a></li>
                        <li class="list-group-item"><a href="<?php echo URLROOT; ?>/posts/add">Add Post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?> 