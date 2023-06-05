// Fonction pour afficher le pop-up
function showCookiePopup() {
    var popup = document.querySelector('.cookie-popup');
    popup.style.display = 'block';
  }
  
  // Fonction pour fermer le pop-up
  function closeCookiePopup() {
    var popup = document.querySelector('.cookie-popup');
    popup.style.display = 'none';
  }
  
  // Appeler la fonction pour afficher le pop-up au chargement de la page
  window.onload = showCookiePopup;
  
  // Ajouter un gestionnaire d'événement pour le clic sur le bouton "Enregistrer les préférences"
  var saveButton = document.querySelector('.save-preferences-button');
  saveButton.addEventListener('click', closeCookiePopup);
  