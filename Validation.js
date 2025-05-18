document.addEventListener("DOMContentLoaded", function () { // Quand le HTML est chargé, faites function(), tout ce qu’il y a à l’intérieur se lancera une fois que la page est prête.
  const form = document.querySelector("form"); //chercher le premier élément "form" de la page.
  if (!form) return; //si le formulaire n’existe pas, on arrete le script

  const emailInput = form.querySelector('input[type="email"]'); //chercher "email" dans le formulaire
  const passwordInput = form.querySelector('input[type="password"]'); //chercher "password" dans le formulaire
  const emailError = document.createElement("p"); // on cree des nv elements qui n'existent pas dans le html! le "p" sert à afficher un message d'erreur pour l'e-mail
  const passwordError = document.createElement("p"); //erreur pour le mot de passe,
  const counter = document.createElement("p"); //compter et afficher le nombre de caractères tapés dans le mot de passe :
  const togglePassword = document.createElement("span"); //pour afficher ou demasquer les mdp! le "span" est utilisée pour ajouter une icône ou un petit texte à côté d’autre chose.

  // Mise en forme, CSS en ligne ou style en JS.
  emailError.style.color = "red"; //const emailError = document.createElement("p");
  passwordError.style.color = "red"; //const passwordError = document.createElement("p");
  counter.style.color = "green"; //const counter = document.createElement("p");
  togglePassword.textContent = "👁️"; // const togglePassword = document.createElement("span"); le contenu texte ici c imoji
  togglePassword.style.cursor = "pointer"; // .cursor : changer le style du curseur de la souris quand on passe sur l’œil, "pointer" ca devient une main pour que l'utilisateur puisse comprendre qu'il peut cliquer dessus!
  togglePassword.style.marginLeft = "10px"; //ajoute un espace à gauche: 10px, entre le champ mot de passe et l’icône 👁️!

  // on ajoute dynamiquement des elements de html qui n'etaient pas presents dans nos pages .html/.php
  if (emailInput) emailInput.parentNode.appendChild(emailError); //Si le champ de l’e-mail existe (<input type="email">), alors on ajoute le message d’erreur emailError juste après lui(si besoin). parentNode: Le parent direct HTML de ce champs, on lui ajoute un enfant. const emailError = document.createElement("p");
  if (passwordInput) { //Si le champ mot de passe existe
    passwordInput.parentNode.appendChild(passwordError);  // On ajoute une zone d’erreur 
    passwordInput.parentNode.appendChild(counter); // On ajoute un compteur de caractères.
    passwordInput.parentNode.appendChild(togglePassword); // On ajoute l’icône œil 
  }

  // Compteur, 
  if (passwordInput) { // vérifier que l'élément du mot de passe existe
    passwordInput.addEventListener("input", () => {
      counter.textContent = `${passwordInput.value.length} caractères`;
    });

    togglePassword.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type");
      passwordInput.setAttribute("type", type === "password" ? "text" : "password");
    });
  }

  form.addEventListener("submit", function (event) {
    let valid = true;
    if (emailInput) {
      emailError.textContent = "";
      if (!emailInput.value.includes("@")) {
        emailError.textContent = "Adresse e-mail invalide.";
        valid = false;
      }
    }

    if (passwordInput) {
      passwordError.textContent = "";
      if (passwordInput.value.length < 6) {
        passwordError.textContent = "Le mot de passe doit contenir au moins 6 caractères.";
        valid = false;
      }
    }

    if (!valid) event.preventDefault();
  });
});
