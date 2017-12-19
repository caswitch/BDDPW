function affectedByClass(elem, cname) {
	if (!elem){
		return false;
	}

	if (elem.classList && elem.classList.contains(cname)){
		return true;
	}

	return affectedByClass(elem.parentNode, cname);
}

function checkEmpty(){
	var affected = affectedByClass(this, "non-empty");
	if (!affected && this.oldBorder != undefined){
		this.style.borderColor=this.oldBorder;
	}
	
	if (affected){
		if (this.value == ""){
			if (this.oldBorder == undefined){
				this.oldBorder = this.style.borderColor;
				this.style.borderColor="red";
			}
		}
		else {
			this.style.borderColor=this.oldBorder;
			this.oldBorder = undefined;
		}
	}

}

var inp = $('input');
inp.on('blur keyup keydown paste change input', checkEmpty);

var tea = $('textarea');
tea.on('blur keyup keydown paste change input', checkEmpty);