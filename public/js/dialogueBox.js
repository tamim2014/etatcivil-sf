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

/* #########################################################
 * 
 * Accueil.php 👉 table backend/colonne_supprimer_acte.php 
 * Gestion du Bouton 🗑️  ( dernière colonne de la table)
 * 
 */
 
//1. Alerte de précaution avant suppression(Btn OK/Annuler):
function confirmerSuppression(id) {
    const modal = document.getElementById("confirmModal");
    modal.style.display = "flex";

    document.getElementById("btnOk").onclick = async function() {

        const response = await fetch(`/supprimer/${id}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        if (result.success) {
            // On ferme le modal
            modal.style.display = "none";

            // On supprime la ligne du tableau
            document.querySelector(`[data-id="${id}"]`).closest('tr').remove();
        } else {
            alert("Erreur : " + result.message);
        }
    };

    document.getElementById("btnCancel").onclick = function() {
        modal.style.display = "none";
    };
}
