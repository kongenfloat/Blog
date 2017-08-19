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

        echo "<form name='edit_form' action='php/edit_post.php' method='post' enctype='multipart/form-data'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='text' name='heading' value='$heading'>";
                echo "<textarea name='blog_text' id='textarea'>$blog_text</textarea>";
                echo "<img src='$image' class='center margin-top-4 post-img'>";
                echo "<button type='button'>Velg et nytt bilde</button>";
                /*
                echo "<label for='fileToUpload'>Velg et bilde for opplasting:</label>";
                echo "<input type='file' name='fileToUpload' id='fileToUpload' value='$image'>";
                */
                echo "<input type='submit' value='Endre blogginnlegget' name='submit'>";


        echo "</form>";

        /*
        echo "<h2 class='center-text'>$heading</h2>";
        echo "<p class='center-text'>$created</p>";
        echo "<p class='center'>$blog_text</p>";
        echo "<img src='$image' class='center margin-top-4 post-img'>";
        echo "<p class='center-text'>Views: $views</p>";
        */

?>
