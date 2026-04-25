	   /**
        *
		* 1. OUVERTURE DU PANEL(accueil.html.twig -> accueil_prefecture.html.twih)
		* 2. CHARGEMENT DES 4 TABLES relatives  aux boutonx(Supprimer, Rectifier, Imprimer, Trier) dans le panel
		*
		*     Pour la table "Afficher" : Le chargement est fait par ##### capture_item.js #####
		* 
		*  Avec Ajax il faut une fonction pour chaque table => 4 fonctions
		*  Avec jQuery, une seule sonction suffit pour les 4 tables
        *	
        * 3. Page source: accueil_prefecture.html.twig	
        *		
	    */
	 
	
	    // Afficher une table en fonction du bouton cliqué
            $(document).ready(function(){
				 // 1. Ouvreture du panel: $("#panel").fadeToggle("200"); fait moins l'accordeon⚠️[ça danse trop avec slideToggle(slow);]
                 $("#flip").click(function(){ $("#panel").fadeToggle("200");}); 
				 // 2. Chargement des tables dans le panel
				 $(' a#rectif, a#zima , a#print_ , a#trier ').click(function(e){ 
                    $('#panel').load($(this).attr('href'));  // //$('#panel').load('/tablesupprimer');
                    e.preventDefault();
                 });
                 //$('.tab a:first').trigger('click'); // Affiche la page1 par defaut
            });
	

	
        // Solution AJAX: Une fonction pour chaque table => 4 fonctions
		
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
		
		


		