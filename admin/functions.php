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

?>