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

	console.log("asd");
	const deneme = document.getElementById('deneme').value;
	console.log(deneme);
	if(deneme==1)
	{

	  document.getElementById('asd').style.display = 'block';
	}
