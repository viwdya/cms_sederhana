<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2><?php echo $data['post']->title; ?></h2>
            <small class="text-muted">Posted on <?php echo $data['post']->created_at; ?></small>
            <hr>
            <p><?php echo nl2br($data['post']->content); ?></p>
            <a href="<?php echo URLROOT; ?>/posts" class="btn btn-secondary mt-3">Back to Posts</a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?> 