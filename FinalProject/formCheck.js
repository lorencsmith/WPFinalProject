function checkCompleteness(){
    var form = document.getElementById("name_form");

    // restore black color to any elements previously flagged
    colorize("fN_label","black");
    colorize("lN_label","black");
    colorize("ad_label","black");
    colorize("pw_label","black");
    colorize("pwC_label","black");
    
    if( form.fN.value.length == 0 ) { // user First Name entered
	alert("You must enter a first name");
	colorize("fN_label","red");
	return false;
    }

    if( form.lN.value == 0 ) { // user Last Name entered
	alert("You must enter a last name");
	colorize("lN_label","red");
	return false;
    }
	
	if( form.ad.value.length == 0 ) { // user address entered
	alert("You must enter an address");
	colorize("ad_label","red");
	return false;
    }
    
    if(form.pw.value.length < 8) {
		alert("Password must be more than 8 characters.");
		colorize("pw_label", "red");
		return false;
	}
	
	if(form.pwC.value != form.pw.value){
		alert("Passwords do not match.");
		colorize("pw_label", "red");
		colorize("pwC_label", "red");
		return false;
	}
	
    // passed all the checks: OK to submit
    
    return true;
}

function colorize(elementName, color)
{
    document.getElementById(elementName).style.color = color;
}
