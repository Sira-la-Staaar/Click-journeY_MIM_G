document.addEventListener("DOMContentLoaded", function () { // Quand le HTML est chargé, faites function(), tout ce qu’il y a à l’intérieur se lancera une fois que la page est prête.
  const passwordInput = document.getElementById("motdepasse");
  const togglePassword = document.getElementById("togglePassword");
  
  const form = document.querySelector("form"); //chercher le premier élément "form" de la page.
  if (!form) return; //si le formulaire n’existe pas, on arrete le script

  const emailInput = form.querySelector('input[type="email"]'); //chercher "email" dans le formulaire
  const emailError = document.createElement("p"); // on cree des nv elements qui n'existent pas dans le html! le "p" sert à afficher un message d'erreur pour l'e-mail
  const passwordError = document.createElement("p"); //erreur pour le mot de passe,
  const counter = document.createElement("p"); //compter et afficher le nombre de caractères tapés dans le mot de passe :
  
  // Mise en forme, CSS en ligne ou style en JS.
  emailError.style.color = "red"; //const emailError = document.createElement("p");
  passwordError.style.color = "red"; //const passwordError = document.createElement("p");
  counter.style.color = "green"; //const counter = document.createElement("p");
  togglePassword.style.cursor = "pointer"; // .cursor : changer le style du curseur de la souris quand on passe sur l’œil, "pointer" ca devient une main pour que l'utilisateur puisse comprendre qu'il peut cliquer dessus!
  togglePassword.style.marginLeft = "10px"; //ajoute un espace à gauche: 10px, entre le champ mot de passe et l’icône 👁️!

  // on ajoute dynamiquement des elements de html qui n'etaient pas presents dans nos pages .html/.php
if (emailInput) {
  emailInput.parentNode.appendChild(emailError); // zone d’erreur email

  const emailCounter = document.createElement("p"); // compteur
  emailCounter.style.color = "gray";
  emailInput.parentNode.appendChild(emailCounter);

  emailInput.addEventListener("input", () => {
    emailCounter.textContent = `${emailInput.value.length} caractères`;
  });
}
  if (passwordInput) { //Si le champ mot de passe existe
    passwordInput.parentNode.appendChild(passwordError);  // On ajoute une zone d’erreur 
    passwordInput.parentNode.appendChild(counter); // On ajoute un compteur de caractères.
  }
  
  // Compteur, 
  if (passwordInput) { // vérifier que l'élément du mot de passe existe
    passwordInput.addEventListener("input", () => { // "input" se déclenche à chaque fois que l'utilisateur écrit ou modifie le champ.
      counter.textContent = `${passwordInput.value.length} caractères`; // mettre à jour counter avec le nombre de caractères tapés dans le champ mot de passe.
    });

    togglePassword.addEventListener("click", () => { // si l'utilisateur cliques sur l'icone oeil, on executera le code suivant! 
      const type = passwordInput.getAttribute("type"); // On récupère le type actuel du champ mot de passe.
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
