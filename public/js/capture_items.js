
      
		// instance XMLHttpRequest  for all browsers. Attention! c'est peut être cette fonction qui pose problème à IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
        function captureCombo(prfctr) { 
            if (prfctr == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
                //1.Connection[au serveur php] et Paramèttrage[prfctr est la prefecture choisie] 
				xmlhttp.open("GET","SERVEUR/colonne_afficher_naissance.php?p="+prfctr,true);
                //2.Envoi
				xmlhttp.send(); 
				//3.Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div panel[document.getElementById("panel").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};

            }
        }
		function captureSousMenu(prfctr){ // prfctr=préfecture selectionnée dans le sous-menu
            if (prfctr == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			}else{ 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+
               
                //1.Connection[au serveur php] et Paramèttrage[prfctr est la prefecture choisie]  
				xmlhttp.open("GET","SERVEUR/lectureBD_afficherNaissance.php?pr="+prfctr,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                //2.Envoi
				xmlhttp.send(); 
				//3.Réception réponse du serveur [xmlhttp.responseText] et affichage dans div yivawo
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
					//activerPopup();
				};
            }
        }
		/*
		function captureSousMenu(prfctr) { // la mm fonction avec fetch
			const cible = document.getElementById("yivawo");
			if(prfctr === ""){ cible.innerHTML=""; return; }
			fetch(`SERVEUR/lectureBD_afficherNaissance.php?pr=${encodeURIComponent(prfctr)}`)
				.then(response => {
					if (!response.ok) { throw new Error("Erreur réseau : " + response.status }
					return response.text();
				})
				.then(data => {
					cible.innerHTML = data;
					// activerPopup(); // si tu veux le remettre
				})
				.catch(error => {
					console.error("Erreur AJAX :", error); cible.innerHTML = "<p>Une erreur est survenue.</p>";
				});
		}		
		function popup_lectureBD2_(url){
			window.open(
				url,
				'Popup',
				'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
			);
		}
		function activerPopup() {
			document.querySelectorAll(".btnPopup").forEach(function(el){
				el.addEventListener("click", function(e){
					e.preventDefault();
					popup_lectureBD2_(this.href);
				});
			});
		}
		*/


		
//________________________________________________________________________________________________________________________________		
		
 


 /**
    * 
	* L'AFFICHAGE DE LA TABLE DANS "lectureBD.php" SE FAIT EN 3 ETAPES:
    *
    * ETAPE1: jQuery capture le clic sur la prefecture
	           $("... ul.subMenu li a").click(...);
    * ETAPE2: jQuery transmet la prefecture(prfctr) cliquée à AJAX en lança cette fonction: 
	           captureSousMenu(this.textContent);
    *
    * ETAPE3: AJAX execute la fontion pour afficher la table relative à la prefecture transmise:
    *         xmlhttp.open(...url de la table...);
	*         xmlhttp.send();
    *         document.getElementById("yivawo").innerHTML = xmlhttp.responseText;	 
	*
    */	 
		 
	$(document).ready(function(){
		//topMenu.php(sous-menu): : ACTIVATION DES LIENS DU SOUS-MENU accordeon(les prefectures)
		$("ul li.dropdown div.dropdown-content div#aside ul.navigation li.toggleSubMenu  ul.subMenu li a").click(function() {// jQuery capture clic 
			captureSousMenu(this.textContent); // jQuery transmet la capture à AJAX
		});
	});


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

	






		



		
		

     