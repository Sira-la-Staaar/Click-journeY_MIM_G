function afficherChamps() {
  const nbInput   = document.getElementById('nb_personnes');
  const container = document.getElementById('types_personnes');
  const nb        = parseInt(nbInput.value, 10);
  container.innerHTML = '';

  if (isNaN(nb) || nb < 1 || nb > 10) {
    alert('Le nombre de personnes doit être entre 1 et 10.');
    nbInput.value = 1;
    return;
  }

  const userData = document.body.dataset.user;
  const user     = userData ? JSON.parse(userData) : null;

  for (let i = 0; i < nb; i++) {
    const div = document.createElement('div');

    let nom = '', prenom = '', passport = '', naissance = '', type = '';
    if (i === 0 && user) {
      ({ nom, prenom, passport, naissance } = user);
      type = 'adulte';
    }

    div.innerHTML = `
      <fieldset>
        <legend>Personne ${i + 1}</legend>
        <label>Type :</label>
        <select name="personnes[${i}][type]">
          <option value="adulte" ${type === 'adulte' ? 'selected' : ''}>Adulte</option>
          <option value="enfant" ${type === 'enfant' ? 'selected' : ''}>Enfant</option>
        </select><br>

        <label>Nom :</label>
        <input type="text" name="personnes[${i}][nom]" value="${nom}" required><br>

        <label>Prénom :</label>
        <input type="text" name="personnes[${i}][prenom]" value="${prenom}" required><br>

        <label>Numéro de passeport :</label>
        <input type="text" name="personnes[${i}][passport]" value="" minlength="9" maxlength="9"
               pattern=".{9}" required><br>

        <label>Date de naissance :</label>
        <input type="date" name="personnes[${i}][naissance]" value="${naissance}" required><br>
      </fieldset><br>`;
    container.appendChild(div);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  afficherChamps();
  document.getElementById('nb_personnes')
          .addEventListener('change', afficherChamps);
});
