<!-- Header -->
<?php include("includes/header.php"); ?>

    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text - POST.PHP</small>
                </h1>

            <!-- First Blog Post -->
                <?php 
                    if(!isset($_GET['p_id']))
                        header('Location: index.php');

                    $the_post_id = $_GET['p_id'];

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    $select_all_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts)):
                        $post_id = $row['post_id'];
                        
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_image = $row['post_image'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                ?>   
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>               
                    <?php endwhile; ?>   


                <?php 
                    
                    if(isset($_POST['create_comment'])) {
                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        
                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved' , now())";

                        $create_comment_query = mysqli_query($connection, $query);

                        if($$create_comment_query) {
                            die('Query Failed' . mysqli_error($connection));
                        }
                    }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" name="comment_author" id="author" required >
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="comment_email" id="email" required >
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Your Comment:</label>
                            <textarea class="form-control" rows="3" name="comment_content" id="comment" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="create_comment" >Submit</button>
                    </form>
                </div>

                <hr>


                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>


















                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php"); ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include("includes/footer.php"); ?>