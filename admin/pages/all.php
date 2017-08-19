<?php

	$list = get_all_posts();

	foreach ($list as $post => $value) {
		$id = $list[$post]['id'];
 		$heading = $list[$post]['heading'];
        $blog_text = $list[$post]['blog_text'];
        $image = $list[$post]['image'];
        $created =  $list[$post]['created'];

        $div_id = "div_" . $id;

        //Process $blog_text for minimized post if string length is longer than 150 characters
        if(strlen ($blog_text) > 150){
        	$blog_text = substr ($blog_text , 0, 149);
        	$blog_text = $blog_text . "...";	
        }

        //Process $heading for minimized post if string length is longer than 21 characters
        if(strlen ($heading) > 21){
            $heading = substr ($heading , 0, 20);
            $heading = $heading . "...";    
        }
        
        //$updated = $post['updated'];
        //$likes = $post['likes'];
        //$views = $post['views'];
        echo "<div id='$div_id' class='minimized-post margin-top-4'>";
    		echo "<div class='minimized-post-left'>";
    			echo "<h2>$heading</h2>";
    			echo "<p>$created</p>";
    		echo "</div>";
    		echo "<div class='minimized-post-right'>";
		        //echo "<p>$likes</p>";
		        //echo "<p>$views</p>";
		        echo "<p id='minimized-text'>$blog_text</p>";

                //Using nested quotes to achieve the onclick property
                echo "<input type='button' onclick=\"location.href='?page=edit&id=$id';\" value='Endre' style='display: inline-block; width: 46px; height: 22.2px; font-size: 12px;' />";
                echo "<button value='$id' onclick='delete_post(this);'> Slett </a>";
    		echo "</div>";
        echo "</div>";
	}


?>