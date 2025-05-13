function selectType(value) {
  document.getElementById('type').value = value;
}

document.getElementById('feedbackForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('submit.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    alert(data);
    this.reset();
  })
  .catch(err => {
    alert("Erreur d'envoi");
    console.error(err);
  });
});
