  document.addEventListener("DOMContentLoaded", function () { // exécuter le code après le chargement complet de la page HTML.
    const typeVoyage = document.querySelector('select[name="type-voyage"]'); // chercher un élément <select> dont le name est type-voyage !
    const dateAller = document.getElementById("date-aller"); // récupérer/cibler l’endroit où se trouve la date d’aller.
    const dateRetour = document.getElementById("date-retour"); // récupérer/cibler l’endroit où se trouve la date d’aller et retour.

    function toggleDates() { //gérer quand afficher ou cacher les dates 
      if (typeVoyage.value === "aller simple") { // vérifier si l’utilisateur a choisi aller simple.
        dateAller.style.display = "block"; //si l'utilisateur choisit un aller simple, donc la date aller sera visible (block)
        dateRetour.style.display = "none"; //et donc on cache la date de retour
        document.getElementById("retour").required = false; // date retour non obligatoire
      } else { //sinon, si c un aller retour, les deux dates seront visibles
        dateAller.style.display = "block"; //afficher la date aller 
        dateRetour.style.display = "block"; // afficher la date retour
        document.getElementById("retour").required = true; // date retour obligatoire
      }
    }

    toggleDates(); // Appelle tout de suite cette fonction pour que les dates s'affichent bien au moment où la page apparaît: Au tout début, quand la page se charge (car il faut afficher les bons champs selon ce qui est sélectionné) ou Quand l'utilisateur change le type de voyage.

    typeVoyage.addEventListener("change", toggleDates); //si l’utilisateur change le type de voyage, rappelle la fonction toggleDates!

    const form = document.querySelector("form");

  if (form) {
    form.addEventListener("submit", function (event) {
      const villeDepart = document.getElementById("ville_depart").value;
      const villeArrivee = document.getElementById("ville_arrivee").value;

      console.log("Départ:", villeDepart);
      console.log("Arrivée:", villeArrivee);

      // Si une ville n'est pas sélectionnée
      if (villeDepart === "" || villeArrivee === "") {
        alert("Veuillez sélectionner une ville de départ et une ville d'arrivée.");
        event.preventDefault(); // bloque l'envoi car y a rien!
        return;
      }

      // Si les villes sont identiques
      if (villeDepart === villeArrivee) {
        alert("La ville de départ et la ville d'arrivée doivent être différentes.");
        event.preventDefault(); // bloque l'envoi car les villes sont identiques!
        return;
      }

    });
  }
  });
