<?php

	include_once("connect.php");
	error_reporting( E_ALL );

	function new_post($heading, $text, $image){

		$created = get_datetime();
		global $connect;

		$query = "INSERT INTO blog_posts(`heading`, `blog_text`, `image`, `created`, `updated`, `likes`, `views`) VALUES ('$heading', '$text', '$image', '$created', '$created', 0, 0)";
		mysqli_query($connect, $query) or die("Klarte ikke å legge til blogginnlegget i database..." . mysqli_error($connect));

		//Pre`pa`res s`ta`temen`t and bind parameters
		//Image is not prepared because that unsafe-variable is handled earlier.
		//$stmt = $connect->prepare("INSERT INTO blog_posts(heading, blog_text, image, created, updated, likes, views) VALUES (:heading, :blog_text, :image, :created, :updated, :likes, :views");
		
		//header("Location: http://splend-it.no/blog/admin.php?created=$image&something=$text&again=$heading");
/*
		$sql = "INSERT INTO blog_posts (heading, blog_text, image, created, updated, likes, views) VALUES (:heading, :blog_text, :image, :created, :updated, :likes, :views";
		if($stmt = $connect->prepare($sql)){
    		$stmt->bindParam(":heading", $heading);
	    	$stmt->bindParam(":blog_text", $text);
	    	$stmt->bindParam(":image", $image);
	    	$stmt->bindParam(":created", $created);
	    	$stmt->bindParam(":updated", $created);
	    	$stmt->bindParam(":likes", (int) 0);
	    	$stmt->bindParam(":views", (int) 0);
    		$query->execute();
   			//rest of code here
		}else{
		   //error !! don't go further
		   var_dump($connect->error);
		}
*/



		//$stmt->bind_param("sssssss", $heading_insert, $text_insert, $image_insert, $created_insert, $update_insert, $likes, $views);

		
		/*
		
		//Sets parameters and execute query
		$heading_insert = $heading;
		$text_insert = $text;
		$image_insert = $image;
		$created_insert = $created;
		$update_insert = $created;
		$likes = 0;
		$views = 0;
		
		*/
		/*$stmt->execute();
		
		//Successfull insertion
*//*
		//Closes stmt and conn
		$stmt->close();
		$connect->close();*/
	}



	function get_post($id){
		global $connect;
		$query = "SELECT * FROM blog_posts WHERE `id`=$id LIMIT 1";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

	function get_all_posts(){
		global $connect;
		$query = "SELECT * FROM blog_posts ORDER BY created DESC";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $row;
	}

	function add_view($id){
		global $connect;
		$result = get_post($id);

		$views = $result['views'];
		$views++;

		$query = "UPDATE blog_posts SET `views` = $views WHERE `id` = $id";
		mysqli_query($connect, $query) or die("Klarte ikke å legge til blogginnlegget i database..." . mysqli_error($connect));

	}


	function add_like($id, $ip){
		global $connect;
		$result = get_post($id);

		$likes = $result['likes'];
		$likes++;

		$query = "UPDATE blog_posts SET `likes` = $likes WHERE `id` = $id";
		mysqli_query($connect, $query) or die("Klarte ikke å legge til blogginnlegget i database..." . mysqli_error($connect));

		$query = "INSERT INTO ip_list(`post_id`, `ip`) VALUES ('$id', '$ip')";
		mysqli_query($connect, $query) or die("Klarte ikke å legge til blogginnlegget i database..." . mysqli_error($connect));

		return $likes;
	}

	function get_ip_list_with_id($id){
		global $connect;
		$query = "SELECT * FROM ip_list WHERE `post_id` = $id";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $row;
	}
?>