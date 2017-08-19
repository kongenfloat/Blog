function delete_post(button) {

	var id = button.value;
	var div_id = "div_" + id.toString();
	//Ask user to confirm delete. 
	var r = confirm("Er du sikker på at du vil slette dette blogginnlegget?");
	if (r == true) {
		
		var xhttp;

		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var element = document.getElementById(div_id);
				element.parentNode.removeChild(element);
				var msg = xhttp.responseText;
				document.getElementById("ajax-msg").style = "visibility: visible";
				document.getElementById("msg").innerHTML = msg;

			}
		};
		xhttp.open("GET", "php/delete.php?id="+id, true);
		xhttp.send(); 

	}
};
