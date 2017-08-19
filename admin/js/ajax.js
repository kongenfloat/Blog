function delete_post(button) {

	var id = button.value;
	//Ask user to confirm delete. 
	var r = confirm("Press a button!");
	if (r == true) {
		
		var xhttp;

		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var msg = xhttp.responseText;
				console.log(msg); //Display "true" after first like
				
				/*if(msg === "true"){
					//alert("Den er true");
					document.getElementById("error").innerHTML = "Du har allerede likt dette blogginnlegget";
				}else{
					//alert("Den er ikke true");
					document.getElementById("likes").innerHTML = msg;
				}*/
			}
		};
		xhttp.open("GET", "php/delete.php?id="+id, true);
		xhttp.send(); 

	}
};
