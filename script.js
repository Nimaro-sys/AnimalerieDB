document.addEventListener('DOMContentLoaded', () => {
    fetch('animals_api.php')
      .then(response => response.json())
      .then(animaux => {
        const container = document.getElementById('cardsContainer');
        animaux.forEach(animal => {
          // Création d'une colonne pour la card
          const colDiv = document.createElement('div');
          colDiv.classList.add('col-md-4', 'mb-4');
  
          // Création de la card
          const cardDiv = document.createElement('div');
          cardDiv.classList.add('card', 'h-100');
  
          // Ajout de l'image (si absente, utilisation d'un placeholder)
          const img = document.createElement('img');
          img.classList.add('card-img-top');
          img.src = animal.image ? animal.image : 'placeholder.jpg';
          img.alt = animal.nom;
          cardDiv.appendChild(img);
  
          // Corps de la card
          const cardBody = document.createElement('div');
          cardBody.classList.add('card-body');
  
          const title = document.createElement('h5');
          title.classList.add('card-title');
          title.textContent = animal.nom;
          cardBody.appendChild(title);
  
          const text = document.createElement('p');
          text.classList.add('card-text');
          text.innerHTML = `
            <strong>Genre :</strong> ${animal.genre}<br>
            <strong>Identifiant :</strong> ${animal.id}<br>
            <strong>Pays d'origine :</strong> ${animal.pays}<br>
            <strong>Date de naissance :</strong> ${animal.date_naissance}<br>
            <strong>Date d'arrivée :</strong> ${animal.date_arrivee}<br>
            <strong>Date de décès :</strong> ${animal.date_deces ? animal.date_deces : 'N/A'}<br>
            <strong>Histoire :</strong> ${animal.histoire}
          `;
          cardBody.appendChild(text);
  
          cardDiv.appendChild(cardBody);
          colDiv.appendChild(cardDiv);
          container.appendChild(colDiv);
        });
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données:', error);
      });
  });