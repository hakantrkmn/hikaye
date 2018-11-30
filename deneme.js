function charcountupdate(str) {
	var lng = str.length;
	document.getElementById("charcount").innerHTML = lng + '/700';
	if (lng>700) {
		swal({
			title: 'fazla karakter!',
			text: 'izin ver hikayeni başka insanlar devam ettirsin :)',
			icon: 'info',
			button: 'Cool'
		})
		let deneme = str.slice(0,699);
		document.getElementById("textbox").value =  deneme;


	}
}


$(window).bind("load", function() {
	if( document.getElementById('deneme') != null)
	{


		const deneme = document.getElementById('deneme').value;
		if(deneme==1)
		{

			document.getElementById('asd').style.display = 'block';
		}
	}

if(document.getElementById('xd') != null)
{

	const deneme = document.getElementById('xd').value;
	if(deneme==1)
	{

		document.getElementById('asd').style.display = 'block';
	}
}



});

$(window).bind("load", function() {
let tiklama = document.querySelectorAll("#silme");

for (var i = 0; i < tiklama.length; i++) {
	tiklama[i].addEventListener("click",func);
}





console.log(tiklama.length);


function func(e)
{
	this.parentElement.parentElement.parentElement.className = "col-md-12";
	if (this==tiklama[0]) {
		tiklama[1].parentElement.parentElement.parentElement.style.display="none";
		tiklama[2].parentElement.parentElement.parentElement.style.display="none";
	}
	else if (this==tiklama[1]) {
		tiklama[0].parentElement.parentElement.parentElement.style.display="none";
		tiklama[2].parentElement.parentElement.parentElement.style.display="none";
	}
	else if (this==tiklama[2]) {
		tiklama[0].parentElement.parentElement.parentElement.style.display="none";
		tiklama[1].parentElement.parentElement.parentElement.style.display="none";
	}
	this.text = "geri dön";


	e.preventDefault()
}
});
