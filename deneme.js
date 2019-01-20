

$(window).bind("load", function() {

	$(".btn.btn-primary.silme").each(function( index ) {
		$(this).click(function(){

			if($(".btn.btn-primary.silme").not($(this)).parent().parent().is(":hidden")==true)
			{
				$(".btn.btn-primary.silme").not($(this)).parent().parent().show(1000);
				$(this).parent().parent().parent().removeClass('col-md-12').addClass('col-md-4');
				$(this).html("Oku");
				$(this).parent().children().css("whiteSpace","nowrap");

			}
			else{
				let a = this;
				$(".btn.btn-primary.silme").not($(this)).parent().parent().hide(1000);

				setTimeout(function() {
        $(a).parent().parent().parent().removeClass('col-md-4').addClass('col-md-12');}, 1000);
				$(a).parent().parent().width("-webkit-fill-available");
				$(a).parent().children().css("whiteSpace","normal");
			$(a).html("Geri dön");

			}




		})
	});


	});








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
			title: 'Fazla Karakter!',
			text: 'İzin ver hikayeni başka insanlar devam ettirsin :)',
			icon: 'info',
			button: 'Anladım'
		})
		let deneme = str.slice(0,699);
		document.getElementById("textbox").value =  deneme;

	}

}
