<?php
session_start();
		include_once("../access/database_functions.php");
		include_once("../../admin/php/functions.php");
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			$list = get_ip_list_with_id($id);

			$ip = get_client_ip();

			$found = false;

			foreach ($list as $element => $value) {
				if( $ip == $list[$element]['ip']){
					$found = true;
				}
	        }

	        if($found == false){
				$likes = add_like($id, $ip);
				//$_SESSION["like_msg"] = "<div class='success'><p>Du likte dette blogginnlegget</p></div>";
				//Using # to mark where on the page the user is landing
				header("Location: http://splend-it.no/blog/?id=$id#likes");
				exit;
			}else{
				//$_SESSION["like_msg"] = "<div class='warning'><p>Du har allrede likt dette blogginnlegget</p></div>";
				header("Location: http://splend-it.no/blog/?id=$id#likes");
				exit;
			}
		}

?>