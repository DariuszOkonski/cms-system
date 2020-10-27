<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php 

            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);

            comfirmQuery($select_comments);

            while($row = mysqli_fetch_assoc($select_comments)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                // $query_category = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                // $select_categories_id = mysqli_query($connection, $query_category);
                
                // while($row = mysqli_fetch_assoc($select_categories_id)) {
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                // }

                $post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $select_post_id_query = mysqli_query($connection, $post_query);

                while($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                }


                echo "
                    <tr>
                        <td>{$comment_id}</td>
                        <td>{$comment_author}</td>
                        <td>{$comment_content}</td>
                        <td>{$comment_email}</td>
                        <td>{$comment_status}</td>
                        <td>
                            <a href='../post.php?p_id=$post_id'>{$post_title}</a>
                        </td>
                        <td>{$comment_date}</td>

                        <td>
                            <a href='#'>Approve</a>
                        </td>
                        <td>
                            <a href='#'>Unapprove</a>
                        </td>
                        <td>
                            <a href='#'>Delete</a>
                        </td>
                    </tr>
                ";
            }
        
        ?>
    </tbody>
</table>

<?php 

    if(isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);

        comfirmQuery($delete_query);
        header('Location: posts.php');
    }
            

?>
