/*function getCookie(name){
  return document.cookie.split('; ')
          .find(row => row.startsWith(name + '='))?.split('=')[1];
}
function setCookie(name,val,days=365){
  document.cookie = `${name}=${val};path=/;max-age=${days*86400}`;
}

const THEMES = ['clair','sombre','large'];

function applyTheme(t){
  if(!THEMES.includes(t)) t = 'clair';           // sécurité
  document.getElementById('theme').href = `css/theme-${t}.css`;
  document.getElementById('switchTheme').value = t;
  setCookie('theme', t);
}

document.addEventListener('DOMContentLoaded', ()=>{
  const saved = getCookie('theme');
  applyTheme(saved || 'clair');

  document.getElementById('switchTheme').addEventListener('change', e=>{
    applyTheme(e.target.value);
  });
});*/

document.addEventListener('DOMContentLoaded', () => {
  const link  = document.getElementById('theme');
  const select   = document.getElementById('switchTheme');

  // 1) au chargement, applique le thème mémorisé
  const saved = getCookie('theme') || 'clair';
  setTheme(saved);
  select.value = saved;

  // 2) quand l'utilisateur change l'option
  select.addEventListener('change', e => setTheme(e.target.value));

  function setTheme(name) {
    const file = {
      clair   : 'CSS/theme-clair.css',
      sombre  : 'CSS/theme-sombre.css',
      large   : 'CSS/theme-large.css'
    }[name] || 'CSS/theme-clair.css';

    link.href = file;                       // charge la nouvelle feuille
    document.cookie = `theme=${name};path=/;max-age=31536000`; // 1 an
  }

  function getCookie(key) {
    return document.cookie
      .split('; ')
      .find(c => c.startsWith(key + '='))?.split('=')[1];
  }
});
