document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('modal-mobile-search');
  const openSearchBtn = document.querySelector('.botoes-mobile .button.is-light');
  const closeBtn = modal?.querySelector('.modal-close');
  const modalBg = modal?.querySelector('.modal-background');

  const btnMudarFoto = document.getElementById('btn-mudar-foto');
  const inputFoto = document.getElementById('upload-foto');
  const preview = document.getElementById('foto-perfil');

  if (openSearchBtn && modal) {
    openSearchBtn.addEventListener('click', () => {
      modal.classList.add('is-active');
    });

    closeBtn?.addEventListener('click', () => {
      modal.classList.remove('is-active');
    });

    modalBg?.addEventListener('click', () => {
      modal.classList.remove('is-active');
    });
  }

  document.querySelectorAll('.perfil-card').forEach(card => {
    const footer = card.querySelector('footer');
    card.addEventListener('touchstart', () => {
      footer.style.opacity = '1';
      footer.style.transform = 'translateY(0)';
      footer.style.pointerEvents = 'auto';

      setTimeout(() => {
        footer.style.opacity = '0';
        footer.style.transform = 'translateY(100%)';
        footer.style.pointerEvents = 'none';
      }, 3000);
    });
  });

  if (btnMudarFoto && inputFoto && preview) {
    btnMudarFoto.addEventListener('click', (e) => {
      e.preventDefault();
      inputFoto.click();
    });

    inputFoto.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = (e) => {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(file);
    });
  }
});
