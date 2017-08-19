
    <form name="post_form" action="php/create_post.php" method="post" enctype="multipart/form-data">
        <input type="text" name="heading" placeholder="Overskrift">
        <textarea name="blog_text" id="textarea">Hva tenker du på?</textarea>
        <label for="fileToUpload">Velg et bilde for opplasting:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Post nytt blogginnlegg" name="submit">
    </form>
