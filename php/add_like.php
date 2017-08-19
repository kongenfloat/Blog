

<?php
		include_once("../access/database_functions.php");
		include_once("functions.php");
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];

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
				echo $likes;
			}else{
				echo "Du har allerede likt dette blogginnlegget";
			}
		}

?>