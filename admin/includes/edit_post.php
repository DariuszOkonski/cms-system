<?php 

    if(isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        $temp_post_image = "";
        $temp_post_image_temp = "";

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

            $temp_post_image = $post_image;
        }
    }

    if(isset($_POST['update_post'])) {
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE posts SET post_title='{$post_title}', post_category_id='{$post_category_id}', post_date = now(), post_author='{$post_author}', post_status='{$post_status}', post_tags='{$post_tags}', post_content='{$post_content}', post_image='{$post_image}' WHERE post_id = {$the_post_id}";

        $update_result = mysqli_query($connection, $query);
        comfirmQuery($update_result);
        header("Location: posts.php");
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Edit Post</h1>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title" required >
    </div>

    <div class="form-group">
        <select class="form_control" name="post_category" id="post_category">
            <?php 
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);

                comfirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author" required >
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status" required >
    </div>

    <!-- TODO set image value -->
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" required >
        <br>
        <img width="100" src="../images/<?php echo $post_image ?>" alt="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" required > 
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea required name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Update Post" name="update_post">
    </div>
</form>