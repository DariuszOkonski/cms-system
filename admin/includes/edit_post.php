<?php 

    if(isset($_GET['source'])) {
        print_r($_GET);
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Edit Post</h1>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" required >
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id" required >
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" required >
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" required >
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" required >
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" required > 
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea required name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Edit Post" name="create_post">
    </div>
</form>