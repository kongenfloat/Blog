function delete_post(button) {

	var id = button.value;
	var div_id = "div_" + id.toString();
	//Ask user to confirm delete. 
	var r = confirm("Press a button!");
	if (r == true) {
		
		var xhttp;

		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var element = document.getElementById(div_id);
				element.parentNode.removeChild(element);
			}
		};
		xhttp.open("GET", "php/delete.php?id="+id, true);
		xhttp.send(); 

	}
};
