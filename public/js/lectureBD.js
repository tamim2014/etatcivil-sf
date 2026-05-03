	 
	// GESTION DES MENU DE LA PAGE lectureBD.php 
	// Ces menus sont vires dans la nouvelle page lectureBD.php(archiv� chez github
	// Lien de l'archive: https://github.com/tamim2014/etatcivil23/tree/lectureBD_archive
	 
        /***************************** script de base qui a ispir� le slide**********************
		*****************************************************************************************************
		*****************************************************************************************************
		$(document).ready(function(){
            $("#flip").click(function(){
                 $("#panel").slideToggle("slow");
            }); 
        });
       *******************************************************************************************************
	   *******************************************************************************************************
	   *******************************************************************************************************/

	   $(document).ready(function(){
		// Affichage du sous menu de gauche(liste des �les) au survol de la souris
            $("#m").mouseover(function(){
                 $("#panel2").show();
				 
            }); 
			/*********�a bouge trop je vais alors conditionne le $("#panel2").hide(); au bouton effacer du sous-menu
			$("#m").mouseout(function(){
                 $("#panel2").hide();
            });
			***************/
		//Faire en sorte qu'en cliquant sur le bouton "Imprimer", le bouton "Afficher" prene sa place et vis vers �a
				$("div#m a#show__").hide();
				$("div#m a#print__").click(function(){
					$("div#m a#show__").show();
					$("div#m a#print__").hide();
				});
				$("div#m a#show__").click(function(){
					$("div#m a#show__").hide();
					$("div#m a#print__").show();
				});
		//au clic sur les items du sous-menu; Afficher le bouton "imprimer"
				$(".island1, .island2, .island3").click(function(){
					$("div#m a#show__").hide();
					$("div#m a#print__").show();
				});
		//au clic sur les items du sous-menu;Afficher(dans la div mnayvawo) la prefecture cliqu�e 
				
				$(".island1, .island2, .island3").click(function(){
					var prefecture_ = $(this).text();// capter le contenu de l'item .islandX cliqu�
					$("#wilaya_").html(prefecture_);// le mettre dans #wilaya
				});
		//ok! Maintenant Faire en sorte qu'en cliquant sur le bouton "Afficher", la 5eme colonne se transforme en "Afficher et nom imprimer" 
			
		// Affichage de la colonne "Imprimer" dans la table du pannau de droite
			
			$(' div.kangalaheMenu a#print__').click(function(e){ 
                  $('#yivawo').load($(this).attr('href'));
                  e.preventDefault();//Tr�s important.Sinon redirection dans une autre page
             });
		// r�a-Affichage de la table "Afficher" dans la table du pannau de droite
		
		     $(' div.kangalaheMenu a#show__').click(function(e){ 
                  $('#yivawo').load($(this).attr('href'));
                  e.preventDefault();
             });
		
		
		
		// Affichage sous-sous-menu(liste des prefecture) � droite, suite au passage de la souris sur le sous menu de gauche(listes des iles)
		// PRINCIPE:L'affichage d'un sous menu fait disparaitre les autres sous menu	
			$(".sousmenu1 ").hide(); $(".sousmenu2 ").hide(); $(".sousmenu3 ").hide();
			
			$(".island1").mouseover(function(){ 
				$(".sousmenu2 ").hide(); $(".sousmenu3 ").hide();    $(".sousmenu1").show();   
                 $(" .panel3").slideDown(3000); // on peu aussi utiliser fadeIn("slow");  ou fadeIn(3000); 
				 $(".piedmenu").fadeIn(3000);// CELUI-CI ne respecte pas la vitesse d'affichage.Pourquoi? parcequ'on l'a attribu� un display:block (et on peut enlever �a sinon il va s'afficher dans la mm ligne que le bouton precedenr)
                
			});
			
			$(".island2").mouseover(function(){
				 $(".sousmenu1 ").hide();  $(".sousmenu3 ").hide();    $(".sousmenu2").show();  
                 $(" .panel3").slideDown(3000); 
				 $(".piedmenu").fadeIn(3000);
                 
			});
			
			$(".island3").mouseover(function(){
				  $(".sousmenu1 ").hide(); $(".sousmenu2 ").hide();    $(".sousmenu3").show();  
                 $(" .panel3").slideDown(3000);  
				 $(".piedmenu").fadeIn(3000);
                 
			});
		// Cacher manuellement les sous-menu en cliquant sur leur pieds de page
		//Cette action sera annonc� par unscript css3(hover:fond blanc+ message) voir lectureBD.css 
		    $(".piedSousMenuDroite").click(function(){
				// La 2�me commande devrait suffir � elle seule. Mais bizaremment son 1er argument et ignor� alors je l'ai appliqu� s�parement 
                // �a fait redondance mais bon ... g pas le choix!
				$(".sousmenu1 , .sousmenu2 , .sousmenu3 ").fadeOut("slow" ); 
				 $(".sousmenu1 , .sousmenu2 , .sousmenu3 ").fadeOut("slow",$("#panel2").show()  );
				 
				 $("#panel2").hide();// Fermeture du slide( contenant les 3 �les) au panneau de gauche
			});
			
			/****** aucun effet
			$("#print__").mouseover(function(){
				$("#print__").css("background-color","black");
			});
			 Aucun effet non plus
		    $(".piedMenuGauche").mouseover(function(){
				$(".piedMenuGauche").css("background-color","black");
			});
			*********************/
			

        });

//��������������������������������������������������������������������������������������������������������������������������������������������
//---------------Page: lectureBD2.php(suite a une recherche document depuis la page d'accueil)---------------------------------------

        // instance XMLHttpRequest  for all browsers_f�perso
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
      // Cette fonction repond au clic sur le lien "Afficher"
	   function showActe(str) { // SUITE AU CLIC SUR LE LIEN "afficher"
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
				xmlhttp.open("GET","afficherdanspanel.php?n="+str,true); //"inc/lecture/afficherdanspanel.php?n="+str
                xmlhttp.send();
                xmlhttp.onreadystatechange = function() { 
				    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					     document.getElementById("yivawo").innerHTML = xmlhttp.responseText;
						 /*
						  var reponsebackend = xmlhttp.responseText;
						  var affichageDansDiv = document.getElementById("yivawo").innerHTML;
						  affichageDansDiv = reponsebackend;
						 */ 
						}
					};
           
            }
        }
// Cette fonction r�pond au bouton"Zoom" ou au bouton "Affiche plein �cran"
// ces fonctionnanalit�s sont vir�es dans la nouvelle page lectureBD.php
// mais je ne suprime pas encore la fonction car je sais pas si je l'ai utilis�e ailleurs!
    function popup_lectureBD2(){ 
		     //window.open("afficherdanspop.php",'Popup','scrollbars=1,Menubar=1,resizable=1,height=409,width=958,top=258,left=175'); return false;          
		     window.open("afficherdanspop.php",'Popup','scrollbars=1,Menubar=1,resizable=1,height=409,width=958,top=258,left=175'); return false;          
	}
/**
 *
 * Pour les popup chez la page d'accueil (Panel->Afficher)
 * Pour le popup chez lectureBD.php( lectureBD.php->backend/lectureBD_afficherNaissance.php)
 * Pour lepopup chez lectureBD2.php: C'est la seule qui assure en de resultat multibles
 * appliquee aussi page backend/lectureBD_afficherNaissance.php
 *
 */
function ouvrePop(url) {
	window.open(
		url,
		'Popup',
		'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
	);
	return false;
}