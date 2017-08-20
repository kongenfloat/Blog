<?php
	$id = $_GET['id'];


	$post = get_post($id);
        $heading = $post['heading'];
        $blog_text = $post['blog_text'];
        $image = $post['image'];
        $created = $post['created'];
        $updated = $post['updated'];
        $likes = $post['likes'];
        $views = $post['views'];


        //Check if there is a heading and blog_text stored.
        //If id do not match the session variables is cleared
        if(isset($_SESSION["edit_id"])) {
                if($_SESSION["edit_id"] == $id){
                        $heading = $_SESSION["edit_heading"];
                        $blog_text = $_SESSION["edit_blog_text"];
                }else{
                        unset($_SESSION["edit_id"]);
                        unset($_SESSION["edit_heading"]);
                        unset($_SESSION["edit_blog_text"]);
                }
        }
        ?>



        <form name='edit_form' action='php/edit_post.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='id' value=' <?php echo $id ?> '>
                <input type='text' name='heading' value='<?php echo $heading ?>'>
                <textarea name='blog_text' id='textarea'><?php echo $blog_text ?></textarea>

                <?php 
                if($image != "null"){?>
                        <img src='<?php echo $image ?>' class='center margin-top-4 post-img'>
                <?php
                }else{?>
                        <p style="text-align: center;">Dette blogginnlegget har ikke bilde </p>
                <?php
                }

                ?>
                <label for='fileToUpload' style="display: block; margin:auto; width: 180px;">Velg et bilde for opplasting:</label>
                <input style="display: block; margin: auto; width: 175px; margin-top:2%" type='file' name='fileToUpload' id='fileToUpload' value='$image'>
                
                <input type='submit' value='Endre blogginnlegget' name='submit'>
        </form>

        <!--
        echo "<h2 class='center-text'>$heading</h2>";
        echo "<p class='center-text'>$created</p>";
        echo "<p class='center'>$blog_text</p>";
        echo "<img src='$image' class='center margin-top-4 post-img'>";
        echo "<p class='center-text'>Views: $views</p>";
        */-->