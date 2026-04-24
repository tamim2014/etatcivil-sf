
	   /**
        *
		* Solution AJAX
		*
		*  Normalement un lien href renvoie vers une nouvelle page! 
		*  Ici, on veut que le href renvoie la page dans  la m�me page source: Notamment dan un panel
		*
        *  Affichage des tables dans le slide de la page d'accueil
		*  Cette solution AJAX est d�sactiv�e, remplac�e par des simple lien html.
		*  !!  Je ne sais pas encore si la d�sactivation est effective sur "supprimer"( � verifier) !!
        *		
	    */
		

		// SOLUTION POUR CHARGER LES TABLES DANS UN PANEL DE LA PAGE D'ACCUEIL
		       		// instance XMLHttpRequest  for all browsers
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
		
				// Activation des LIENS dans les tables affich�es dans le slide de la page d'accueil
		function supprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","SERVEUR/accueil_supprimer_acte.php?delete_="+str,true);
				xmlhttp.open("GET","SERVEUR/supprimer.php",true);
                xmlhttp.send();
            }
        }
		
    /****************************
	
		
		function imprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","SERVEUR/accueil_imprimer_acte.php?print_="+str,true);
				//xmlhttp.open("GET","imprimer.php?print_="+str,true);
				xmlhttp.open("GET","SERVEUR/accueil_imprimer_acte.php",true);
				
                xmlhttp.send();
            }
        }
		
								
		function showSupprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","SERVEUR/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","SERVEUR/colonne_supprimer_acte.php",true);
                xmlhttp.send();
            }
        }
		
		function showRectifier(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","SERVEUR/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","SERVEUR/colonne_rectifier_acte.php",true);
                xmlhttp.send();
            }
        }
		
		***** c'est la m�me fonction que  imprimer(str) *********
		function showImprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","SERVEUR/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","SERVEUR/colonne_imprimer_acte.php",true);
                xmlhttp.send();
            }
        }
		

		******************************************/

		