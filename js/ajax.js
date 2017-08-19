function hide(id){
	document.getElementById(id).style.visibility = hidden;
}

function add_like(button) {

	var id = button.value;
	
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		if(this.responseText === "exists"){
			document.getElementById("error").innerHTML = "Du har allerede liket dette blogginnlegget";
		}else{
			document.getElementById("likes").innerHTML = this.responseText;
			hide("likes_label");
		}
	}
	};
	xhttp.open("GET", "php/add_like.php?id="+id, true);
	xhttp.send();   
}