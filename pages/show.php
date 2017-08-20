<?php
        //Get id of blog post to display from GET
	$id = $_GET['id'];

        //Increments view count
	increment_view_count($id);

        //Get post and declare corresponding variables
	$post = get_post($id);
        $heading = $post['heading'];
        $blog_text = $post['blog_text'];
        $image = $post['image'];
        $created = $post['created'];
        $updated = $post['updated'];
        $likes = $post['likes'];
        $views = $post['views'];

        echo "<h2 class='center-text'>$heading</h2>";
        echo "<p class='center-text'>$created</p>";
        echo "<p class='center'>$blog_text</p>";
        echo "<img src='$image' class='center margin-top-4 post-img'>";
        echo "<p class='center-text'>Views: $views</p>";
        echo "<label for='likes' id='likes_label'>Likes: </label>";
        echo "<p id='likes' class='center-text'>$likes</p>";
        echo "<p id='error' style='color:green'></p>";
        

        if(isset($_SESSION['like_msg'])){
            $like_msg = $_SESSION['like_msg']; 
        }else{
            $like_msg="";
        }

        echo $like_msg;

        //Check to see if the user has already liked this blog post
        if(check_ip($id) == true){?>
                <p class='center-text' style='color: green;'>Du har allerede likt dette blogginnlegget</p>	
        <?php
        }else{
                ?>
                <a href="php/add_like.php?id=<?php echo $id?>"> Like </a>
                <?php
        }
		        

        //echo "<p>$updated</p>";
?>