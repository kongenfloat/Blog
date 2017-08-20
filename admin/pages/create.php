<?php 
	
	if(isset($_SESSION["heading"])) {
		$heading = $_SESSION["heading"];
		$blog_text = $_SESSION["blog_text"];
		?>
		<form name='post_form' action='php/create_post.php' method='post' enctype='multipart/form-data'>
		<input type='text' name='heading' value='<?php echo $heading ?>' required="required">
		<textarea name='blog_text' id='textarea' required><?php echo $blog_text ?></textarea>
		<label for='fileToUpload'>Velg et bilde for opplasting:</label>
		<input type='file' name='fileToUpload' id='fileToUpload'>
		<input type='submit' value='Post nytt blogginnlegg' name='submit'>
		</form>

	<?php
	} else {



	?>

		<form name='post_form' action='php/create_post.php' method='post' enctype='multipart/form-data'>
		<input type='text' name='heading' placeholder='Overskrift' required="required">
		<textarea name='blog_text' id='textarea' placeholder="Hva tenker du på?" required></textarea>
		<label for='fileToUpload'>Velg et bilde for opplasting:</label>
		<input type='file' name='fileToUpload' id='fileToUpload'>
		<input type='submit' value='Post nytt blogginnlegg' name='submit'>
		</form>

		<?php
		//Deletes the cookies by setting expiration date to an hour ago
		//setrawcookie("heading", "", time() - 3600);
		//setrawcookie("blog_text", "", time() - 3600);

	}

?>

        
        
        
            
