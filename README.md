*************************************
*                                   *
*      Exercise 2 - Blogsystem      *
*                                   *
*                by                 *
*                                   *
*         André Flåte Olsen         *
*                                   *
*************************************

****************
*              *
*   Database   *
*              *
****************

### blog_posts

- Used to store the blog posts

# id (integer) - Auto increment and primary key
# heading (varchar) - Heading for the blog post
# blog_text (varchar) - Content of the blog post
# image (varchar) - Path to img file on server
# created (datetime) - The date and time when the post was created
# updated (datetime) - The date and time of the last update
# likes (integer) - The number of likes the blog post has
# views (integer) - The number of views the blog post has

### ip_list

- Used to store the ip of an user when he likes a blog post. This is to create a layer of security for spamming the like button.   

# id (integer) - Auto increment and primary key
# post_id (integer) - The id of the blog post liked
# ip (varchar) - User's ip

### users

- Used to store the users of the system (Currently there is only one user: admin)

# id (integer) - Auto increment and primary key
# username (varchar) - User's username
# password (varchar) - User's hashed password

*****************************
*                           *
*   Files and directories   *
*                           *
*****************************

### blog

- blog contains a file named index.php which controlls which page is being showed for the user. index.php uses GET variables to determine which page is displayed for user.  

## /pages

- Contains the different pages that index.php can include. 

# /list.php - Displays a list of all blog posts in the database (This is the default landing page). 

# /show.php - Displays a single blog post. 


****************************

### admin

- This is a back side, only accessible through hard typing the link in browser.
- admin contains a file named index.php which controlls which page is being showed for the user. index.php uses GET variables to determine which page is displayed for user.  

## /pages

- Contains the different pages that index.php can include.

# /all.php - Displays all blog post in database (Default).

# /create.php - Displays a form for creating a blog post.

# /edit.php - Displays a form were the inputs values equal the corresponding blog post.

# /login.php - Displays a login form.

****************************

### access

# /connect.php - Creates a mysqli object for accessing the database.

# /database_functions.php - All database functions are found in this file.

****************************

### php

# /add_like.php - Increments the like count of a blog post

# /clear_session.php - When a user creates or edits a blog post and an error occurs, the data already written is stored in session variables, so the user do not have to write everything over again. This file clears the data, if the user want to. 

# /create_post.php - Testing user inputs and if ok, stores in database. 

# /delete.php - Deletes a blog post

# /edit_post.php - Updates a blog post

# /functions.php - A file for general functions for the system:
-get_datetime() # Gets the current datetime, and adds two hours, because of current server time. 
-test_input($data) # Sanitizes the user inputs
-upload_image() # Uploads an image file to server
-get_client_ip() # Gets users ip
-check_ip($id) # Checking if the user has already liked a blog post
-minimize($text, $length) # Minimizes a string and adds "..." to the end of the new string. 

# /logout.php - Clears the session data, so the user is not longer logged in. 

# /process_login.php - Check if user has inputed correct password if true -> start session, and stores a session variable. 

### js

# /ajax.js - Is used to make the delete function more dynamic, so the user do not have to scroll all the way down to where he/she was. 

****************************