<?php
session_start();
		include_once("../access/database_functions.php");
		include_once("functions.php");
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
				//Using # to mark where on the page the user is landing
				header("Location: http://splend-it.no/blog/?id=$id#likes");
				exit;
			}else{
				header("Location: http://splend-it.no/blog/?id=$id#likes");
				exit;
			}
		}

?>