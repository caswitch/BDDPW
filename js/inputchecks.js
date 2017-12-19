function affectedByClass(elem, cname) {
	if (!elem){
		return false;
	}

	if (elem.classList && elem.classList.contains(cname)){
		return true;
	}

	return affectedByClass(elem.parentNode, cname);
}

function _checkEmpty(elem){
	var affected = affectedByClass(elem, "non-empty");
	if (!affected && elem.oldBorder != undefined){
		elem.style.borderColor=elem.oldBorder;
		return false;
	}
	
	if (!affected)
		return false;

	if (affected && elem.value == ""){
		if (elem.oldBorder == undefined){
			elem.oldBorder = elem.style.borderColor;
			elem.style.borderColor="red";
		}
		return true;
	}

	if (affected && elem.value != ""){
		elem.style.borderColor=elem.oldBorder;
		elem.oldBorder = undefined;
		return false;
	}
}

function checkEmpty(){
	return _checkEmpty(this);
}

var inp = $('input');
inp.on('blur keyup keydown paste change input', checkEmpty);

var tea = $('textarea');
tea.on('blur keyup keydown paste change input', checkEmpty);