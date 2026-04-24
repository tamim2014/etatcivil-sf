    /**
	 *
	 * 1. Capture de la prefecture/Quelle table charger: function captureCombo(prfctr)
	 *
	 * 2. Chargement de la table "Afficher" : function captureCombo(prfctr)
	 *    
	 *    Page source: accueil_choisir_naissance.html.twig 
	 *
	 *    Le chargement des autres tables(Supprimer, Rectifier,Imprimer,Trier), 
	 *    est fait en jQuery par  #######  accueil.commandes_panel.js ##########
	 *    Page source: accueil_prefecture.html.twig 
	 *    
	 * 3. Gestion des dialog message
	 *
	 */
      
		
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     xmlhttp = new XMLHttpRequest();
                } else {
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
        function captureCombo(prfctr) { 
            if (prfctr == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();
                //1. On prend la table relative à la prefecture capturée
				//xmlhttp.open("GET","SERVEUR/colonne_afficher_naissance.php?p="+prfctr,true);
				xmlhttp.open("GET", "/table/naissance?p="+prfctr,true);
                
				xmlhttp.send(); 
				//2. On charge la table dans le #panel
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
				  document.getElementById("panel").innerHTML = xmlhttp.responseText;}
				};
            }
        }

		
		
		function popup_lectureBD2_(url){
			window.open(
				url,
				'Popup',
				'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
			);
		}
        


	
   /**
    * 
	* i fo virer tous ça . c'1 truc de l'ancien projet archivé
	*
	* L'AFFICHAGE DE LA TABLE DANS "lectureBD.php" SE FAIT EN 3 ETAPES:
    *
    * ETAPE1: jQuery capture le clic sur la prefecture
	           $("... ul.subMenu li a").click(...);
    * ETAPE2: jQuery transmet la prefecture(prfctr) cliqu�e � AJAX en lan�a cette fonction: 
	           captureSousMenu(this.textContent);
    *
    * ETAPE3: AJAX execute la fontion pour afficher la table relative � la prefecture transmise:
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


	/**
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

	






		



		
		

     