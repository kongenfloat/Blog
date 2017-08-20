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
        ?>



        <form name='edit_form' action='php/edit_post.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='id' value=' <?php echo $id ?> '>
                <input type='text' name='heading' value='<?php echo $heading ?>'>
                <textarea name='blog_text' id='textarea'><?php echo $blog_text ?></textarea>
                <img src='<?php echo $image ?>' class='center margin-top-4 post-img'>
                <!--<button type='button'>Velg et nytt bilde</button>-->
                
                <label for='fileToUpload'>Velg et bilde for opplasting:</label>
                <input type='file' name='fileToUpload' id='fileToUpload' value='$image'>
                
                <input type='submit' value='Endre blogginnlegget' name='submit'>
        </form>

        <!--
        echo "<h2 class='center-text'>$heading</h2>";
        echo "<p class='center-text'>$created</p>";
        echo "<p class='center'>$blog_text</p>";
        echo "<img src='$image' class='center margin-top-4 post-img'>";
        echo "<p class='center-text'>Views: $views</p>";
        */-->