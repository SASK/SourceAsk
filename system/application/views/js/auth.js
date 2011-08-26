function am(){
	var validcode=document.getElementById('authimage_code');
	if(validcode!=null){
		validcode.src='authimage.php?'+Math.random();
	}
}