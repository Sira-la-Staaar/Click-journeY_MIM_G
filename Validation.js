document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  if (!form) return;

  const emailInput = form.querySelector('input[type="email"]');
  const passwordInput = form.querySelector('input[type="password"]');
  const emailError = document.createElement("p");
  const passwordError = document.createElement("p");
  const counter = document.createElement("p");
  const togglePassword = document.createElement("span");

  // Mise en forme
  emailError.style.color = "red";
  passwordError.style.color = "red";
  counter.style.color = "gray";
  togglePassword.textContent = "👁️";
  togglePassword.style.cursor = "pointer";
  togglePassword.style.marginLeft = "10px";

  // Ajout dynamique
  if (emailInput) emailInput.parentNode.appendChild(emailError);
  if (passwordInput) {
    passwordInput.parentNode.appendChild(passwordError);
    passwordInput.parentNode.appendChild(counter);
    passwordInput.parentNode.appendChild(togglePassword);
  }

  // Compteur
  if (passwordInput) {
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
