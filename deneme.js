function noUser(e){
	swal({
		title: 'Giriş Yapmalısın',
		text: 'Hikaye yazabilmek için giriş yapmalısın',
		icon: 'error',
		button: 'Anladım'
	})
	e.preventDefault;
}

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
	let metin = document.querySelectorAll("#metin");


	for (var i = 0; i < tiklama.length; i++) {
		tiklama[i].addEventListener("click",func);
	}
	function func(e)
	{
		a = this;


		if (a.innerHTML=="geri dön") {
			if (tiklama.length==3) {
				a.parentElement.parentElement.parentElement.className = "col-md-4";
			}
			else {
				a.parentElement.parentElement.parentElement.className = "col-md-6";
			}

			if (a==tiklama[0]) {
				for ( k = 1; k < tiklama.length; k++) {
					tiklama[k].parentElement.parentElement.parentElement.style.display="block";
				}
				metin[0].style.whiteSpace="nowrap"
			}
			else if (a==tiklama[1]) {
				for ( j = 0; j < tiklama.length; j++) {
					if (j==1) {
						j++;
						if (tiklama.length==2) {
							continue;
						}
					}
					tiklama[j].parentElement.parentElement.parentElement.style.display="block";

				}
				metin[1].style.whiteSpace="nowrap"
			}
			else if (a==tiklama[2]) {
				for ( j = 0; j < tiklama.length-1; j++) {
					tiklama[j].parentElement.parentElement.parentElement.style.display="block";
				}
				metin[2].style.whiteSpace="nowrap"
			}
			console.log(a);
			console.log(a.innerHTML);
			a.innerHTML = "Oku";
			return;
		}
		if (a.innerHTML=="Oku") {
			if (a==tiklama[0]) {
				for ( j = 1; j < tiklama.length; j++) {
					tiklama[j].parentElement.parentElement.parentElement.style.display="none";
				}

			}
			else if (a==tiklama[1]) {
				for ( j = 0; j < tiklama.length; j++) {
					if (j==1) {
						j++;
						if (tiklama.length==2) {
							continue;
						}
					}
					tiklama[j].parentElement.parentElement.parentElement.style.display="none";

				}
			}
			else if (a==tiklama[2]) {
				for ( j = 0; j < tiklama.length-1; j++) {

					tiklama[j].parentElement.parentElement.parentElement.style.display="none";
				}
			}
			a.innerHTML = "geri dön";
			var xd = setInterval(function() { // this code is executed every 500 milliseconds:





				if (i<=900) {
					a.parentElement.parentElement.style.width = i+"px";
					console.log(a.parentElement.parentElement.style.width);
					i=i+ 12;
				}
				if (i>=900) {
					clearInterval(xd);
					a.parentElement.childNodes[1].style.whiteSpace="normal"
					a.parentElement.parentElement.style.width = "-webkit-fill-available";
					a.parentElement.parentElement.parentElement.className = "col-md-12";
					console.log(a.parentElement.childNodes[1].style);
					i=0;
				}


				e.preventDefault()

			}, 1);
			return;

		}
	}
});
