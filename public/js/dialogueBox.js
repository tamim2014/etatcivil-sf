/*
 * 09.04.2026
 * Gere les message des bouton(Supprimer,Rectifier) dans la page accueil.php 
 *
 */
function showDialog(msg) {
	console.log(msg);
	//document.getElementById("dialogMessage").innerText = msg;
	document.getElementById("dialogMessage").innerHTML = msg;
	document.getElementById("dialogBox").style.display = "flex";
}

function closeDialog() {
	document.getElementById("dialogBox").style.display = "none";
}

// Pour les popup de la page d'accueil (Panel->Afficher)
function ouvrePop(url) {
	window.open(
		url,
		'Popup',
		'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
	);
	return false;
}