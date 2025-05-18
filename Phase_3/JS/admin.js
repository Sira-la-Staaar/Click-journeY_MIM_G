document.addEventListener('DOMContentLoaded', () => {
  // délai en ms
  const DELAI = 2000;
  document.querySelectorAll('.btn-admin').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();                 
      const form = btn.closest('form');
      simulateDelay(btn, () => form.submit());
    });
  });
  function simulateDelay(element, callback) {
    element.disabled = true;
    const originalLabel = element.value || '';
    if (element.tagName === 'INPUT' && element.type === 'submit') {
      element.value = 'Patientez…';
    }
    element.classList.add('loading');

    setTimeout(() => {
      element.disabled = false;
      if (element.tagName === 'INPUT' && element.type === 'submit') {
        element.value = originalLabel;
      }
      element.classList.remove('loading');
      callback();                         
    }, DELAI);
  }
});
