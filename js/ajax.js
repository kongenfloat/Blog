function hide(id){
	document.getElementById(id).style = "visibility: hidden";
}

function add_like(button) {

	var id = button.value;
	
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var msg = xhttp.responseText;
		console.log(msg); //Display "true" after first like
		if(msg === "true"){
			//alert("Den er true");
			document.getElementById("error").innerHTML = "Du har allerede likt dette blogginnlegget";
		}else{
			//alert("Den er ikke true");
			document.getElementById("likes").innerHTML = msg;
		}
	}
	};
	xhttp.open("GET", "php/add_like.php?id="+id, true);
	xhttp.send();   
}