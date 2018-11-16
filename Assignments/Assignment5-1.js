/*	This document uses regular expression to allow between 6 and 23 characters 
	for the username and password
*/
function userReg() {
	var username = document.getElementById("username");
	var regex = username.value.search(/^[A-z]\w{6,23}$/);
	
	if (regex != 0) {
		alert("The username you entered must be between 6-23 characters. The first character must be a letter.");
		username.focus();
		username.select();
		return false;
	}
	else {
		return true;
	}
}

function passReg() {
	var password = document.getElementById("password");
	var regex = password.value.search(/^[A-z]\w{6,23}$/);
	
	if (regex != 0) {
		alert("The password you entered must be between 6-23 characters. The first character must be a letter.");
		password.focus();
		password.select();
		return false;
	}
	else {
		return true;
	}
}