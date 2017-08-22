<?php

	include_once("connect.php");
	error_reporting( E_ALL );

	function new_post($heading, $text, $image){

		$created = get_datetime();
		global $connect;

		//Protect for MySQL injection
		$heading = mysqli_real_escape_string($connect, $heading);
		$text = mysqli_real_escape_string($connect, $text);

		$views = 0;
		$likes = 0;

		$query = "INSERT INTO blog_posts(`heading`, `blog_text`, `image`, `created`, `updated`, `likes`, `views`) VALUES (?, ?, ?, ?, ?, ?, ?)";

		//Prepares statement, binds parameters and then executes
		$stmt = $connect->prepare($query);
		$stmt->bind_param('sssssii', $heading, $text, $image, $created, $created, $likes , $views);
		$stmt->execute();

		$stmt->close();

	}

	function edit_post($id, $heading, $text, $image){

		$updated = get_datetime();
		global $connect;

		//Protect for MySQL injection
		$heading = mysqli_real_escape_string($connect, $heading);
		$text = mysqli_real_escape_string($connect, $text);

		$query = "UPDATE blog_posts SET `heading` = ?, `blog_text` = ?, `image` = ?, `updated` = ? WHERE `id` = ?";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('ssssi', $heading, $text, $image, $updated, $id);
		$stmt->execute();

		$stmt->close();
	}

	function delete($id){
		global $connect;

		$query = "DELETE FROM blog_posts WHERE `id` = ?";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		$stmt->close();
	}

	//ONLY USED ONCE: admin user. This is to achieve hashing of password. 
	function add_user($username, $password){ 
		global $connect;

		//Protect for MySQL injection
		$username = mysqli_real_escape_string($connect, $username);
		$password = mysqli_real_escape_string($connect, $password);

		$query = "INSERT INTO users (`username`, `password`) VALUES (?, ?)";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('ss', $username, $password);
		$stmt->execute();

		$stmt->close();


	}

	function get_user($username){
		global $connect;
		$query = "SELECT * FROM users WHERE `username` = ? LIMIT 1";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$row = mysqli_fetch_assoc($result);

		$stmt->close();

		return $row;
	}




	function get_post($id){
		global $connect;
		$query = "SELECT * FROM blog_posts WHERE `id`= ? LIMIT 1";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$row = mysqli_fetch_assoc($result);

		$stmt->close();

		return $row;
	}

	function get_all_posts(){

		global $connect;
		$query = "SELECT * FROM blog_posts ORDER BY created DESC";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $row;
	}

	function increment_view_count($id){
		global $connect;
		$result = get_post($id);

		$views = $result['views'];
		$views++;

		$query = "UPDATE blog_posts SET `views` = ? WHERE `id` = ?";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('ii', $views, $id);
		$stmt->execute();

		$stmt->close();


	}


	function add_like($id, $ip){
		global $connect;
		$result = get_post($id);

		$likes = $result['likes'];
		$likes++;

		$query = "UPDATE blog_posts SET `likes` = ? WHERE `id` = ?";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('ii', $likes, $id);
		$stmt->execute();

		$query = "INSERT INTO ip_list(`post_id`, `ip`) VALUES (?, ?)";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('is', $id, $ip);
		$stmt->execute();

		$stmt->close();

		return $likes;
	}

	function get_ip_list_with_id($id){
		global $connect;
		$query = "SELECT * FROM ip_list WHERE `post_id` = ?";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$stmt->close();

		return $row;
	}
?>