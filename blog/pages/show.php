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

    //Converts new lines to break tags to be able to display
    $blog_text = nl2br($blog_text);

    ?>
    <a id="center-a" href="http://splend-it.no/blog/">Tilbake</a>
    <h2 class='center-text' style="margin-top: 5%;"><?php echo $heading ?></h2>
    <p class='center-text'><?php echo $created ?></p>
    <img src='<?php echo $image ?>' class='center margin-top-4 post-img'>
    <p class='center' style="margin-top: 3%;"><?php echo $blog_text ?></p>
    <p class='center-text' style="margin-top: 2%;">Views: <?php echo $views ?></p>
    <p id='likes' class='center-text'>Likes: <?php echo $likes ?></p>
    <p id='error' style='color:green'></p>
        
    <?php
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
            <a id="center-a" href="php/add_like.php?id=<?php echo $id?>"> Like </a>
            <?php
    }
?>