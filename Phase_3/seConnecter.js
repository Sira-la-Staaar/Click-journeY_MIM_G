document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const emailInput = form.querySelector('input[name="username"]');
  const passwordInput = form.querySelector('input[name="password"]');

  // Créer une zone de message pour les erreurs
  const emailError = document.createElement("p");
  const passwordError = document.createElement("p");
  const counter = document.createElement("p");
  const togglePassword = document.createElement("span");

  emailError.style.color = "red";
  passwordError.style.color = "red";
  counter.style.color = "gray";
  togglePassword.textContent = "👁️";
  togglePassword.style.cursor = "pointer";
  togglePassword.style.marginLeft = "10px";

  // Insertion des éléments
  emailInput.parentNode.appendChild(emailError);
  passwordInput.parentNode.appendChild(passwordError);
  passwordInput.parentNode.appendChild(counter);
  passwordInput.parentNode.appendChild(togglePassword);

  // Compteur caractères mot de passe
  passwordInput.addEventListener("input", () => {
    const length = passwordInput.value.length;
    counter.textContent = `${length} caractères`;
  });

  // Afficher / cacher mot de passe
  togglePassword.addEventListener("click", () => {
    const type = passwordInput.getAttribute("type");
    passwordInput.setAttribute("type", type === "password" ? "text" : "password");
  });

  // Empêcher envoi si erreurs
  form.addEventListener("submit", function (event) {
    let valid = true;

    emailError.textContent = "";
    passwordError.textContent = "";

    if (!emailInput.value.includes("@")) {
      emailError.textContent = "Adresse e-mail invalide.";
      valid = false;
    }

    if (passwordInput.value.length < 6) {
      passwordError.textContent = "Le mot de passe doit contenir au moins 6 caractères.";
      valid = false;
    }

    if (!valid) {
      event.preventDefault(); // empêche l'envoi du formulaire
    }
  });
});
