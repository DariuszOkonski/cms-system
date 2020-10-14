<?php 

    if(isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];

        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";  
        $select_posts_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts_by_id)) {
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
        }
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Edit Post</h1>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title" required >
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" name="post_category_id" required >
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author" required >
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status" required >
    </div>

    <!-- TODO set image value -->
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <label for="post_image"> => <?php echo $post_image ?></label>
        <input type="file" name="image" required >
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" required > 
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea required name="post_content" id="" cols="30" rows="10" class="form-control">
            <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Edit Post" name="create_post">
    </div>
</form>