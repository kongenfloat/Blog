<?php

    $list = get_all_posts();

    $num = count($list);

    //Check if there are any posts
    if($num > 0){
        foreach ($list as $post => $value) {
        	$id = $list[$post]['id'];
        	$heading = $list[$post]['heading'];
            $blog_text = $list[$post]['blog_text'];
            $image = $list[$post]['image'];
            $created =  $list[$post]['created'];
            $likes = $list[$post]['likes'];
            $views = $list[$post]['views'];

            //Variables not used used yet. Maybe use in future. 
            //$updated = $post['updated'];
 

            //Process $blog_text for minimized post if string length is longer than 900 characters
            if(strlen ($blog_text) > 600){
                $blog_text = minimize($blog_text, 599);	
            }

    ?>

            <div class='minimized-post-blog margin-top-8'>
                <h3><?php echo $heading ?></h3>
        		<div class='minimized-post-blog-left'>
        			
        			<p><?php echo $created ?></p>
                    <p>Views: <?php echo $views ?></p>
                    <p>Likes: <?php echo $likes ?></p>
                    <?php 
                    if($image != "null"){?>
        			<img id="list-img" src='<?php echo $image ?>'>
        		  <?php
                  }else{?>

                    <div id="list-img"></div>
                  <?php
                  }
                  ?>
                </div>
        		<div class='minimized-post-blog-right'>
    		        <p id='minimized-blog-text'><?php echo $blog_text?></p>
    		        <a href='?id=<?php echo $id ?>'> Les videre </a>
        		</div>
            </div>
    	
        <?php
        }
    //No blog post has been posted yet
    }else{
        ?>
        <p style="text-align : center"> Ingen blogginnlegg har blitt lagt ut enda </p>
        <?php
    }
?>