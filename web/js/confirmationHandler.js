function confirmation(ID) {
	var answer = confirm("Delete entry?")
	if (answer){
		window.location = "../listings/delete?id="+ID;
	}
}