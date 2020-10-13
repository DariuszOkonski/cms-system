<?php 

function insert_categories() {
    global $connection;
    
    if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
            $create_category = mysqli_query($connection, $query);

            if(!$create_category) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo 
        "<tr>
            <td>$cat_id</td>
            <td>$cat_title</td>
            <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
            <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
        </tr>";
    }
}

function deleteCategories() {
    global $connection;

    if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function findAllPosts() {
    global $connection;
    
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "
            <tr>
                <td>{$post_id}</td>
                <td>{$post_author}</td>
                <td>{$post_title}</td>
                <td>{$post_category_id}</td>
                <td>{$post_status}</td>
                <td><img class='img-responsive' width='100' src='../images/{$post_image}' alt='images' /></td>
                <td>{$post_tags}</td>
                <td>{$post_comment_count}</td>
                <td>{$post_date}</td>
            </tr>
        ";
    }
}

?>