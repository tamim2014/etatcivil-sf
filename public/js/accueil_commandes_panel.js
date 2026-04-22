	   /**
        *
		* Solution jQuery
		*
		*  Normalement un lien href renvoie vers une nouvelle page! 
		*  Ici, on veut que le href renvoie la page dans  la même page source: Notamment dan un panel
        *	
        *
        *  intercepter un clic, empêcher la navigation, charger du contenu dans un panel.		
	    */
	 
	 
	 // CommandePanel  page d'acceuil (include prefecture.php)
	 // Solution jQuery pour afficher une table en fonction du bouton cliqué
            $(document).ready(function(){
                 $("#flip").click(function(){ $("#panel").slideToggle("slow");}); //Déroulé du slide changement de prefecture dans le comboBox
				 
				 $(' a#rectif, a#zima , a#print_ , a#trier ').click(function(e){ 
                  $('#panel').load($(this).attr('href')); // appel le fichier  <a id="zima"  href="SERVEUR/colonne_supprimer_acte.php" > par exemple
                  e.preventDefault();//Très important.Sinon redirection dans une autre page
                 });
                 //$('.tab a:first').trigger('click'); // Affiche la page1 par défaut
            });
	

	
	// Solution AJAX pour la modifiaction(affichage) de la 5ème colonne du slide : page d'acceuil (include prefecture.php)
     // Ce code je l'ai mis dans le fichier accueil_liens_colonne4.js   
		
		/****************************
		
						
		// Affichage des tables dans le slide de la page d'accueil

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
		
		


		