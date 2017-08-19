<!doctype html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="container">
    <div id="header">
        <h1 class="center-text">Admin</h1>
    </div>
    <div id="content">
        <form action="php/login" method="post">
            <input type="text" name="heading" placeholder="Overskrift">
            <textarea name="blog_text" id="textarea">Hva tenker du på?</textarea>
            <label for="fileToUpload">Velg et bilde for opplasting:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Post nytt blogginnlegg" name="submit">
        </form>
    </div>
</form>
</div>
</body>
</html>
