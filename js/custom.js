function validateLoginForm(fm){
	if(fm.username.value == ''){
		alert('Please enter username'); fm.username.focus(); return false;
	}
	if(fm.password.value == ''){
		alert('Please enter password'); fm.password.focus(); return false;
	}
}