document.addEventListener("DOMContentLoaded", () => {
    const connexionButton = document.getElementById("connexionButton");
    const connexionForm = document.getElementById("connexionForm");
    const loginForm = document.getElementById("loginForm");
  
    // Afficher/Masquer le formulaire
    connexionButton.addEventListener("click", () => {
      connexionForm.style.display = connexionForm.style.display === "none" ? "block" : "none";
    });
  
    // Gestion de la soumission du formulaire
    loginForm.addEventListener("submit", function(e) {
      e.preventDefault(); // Empêche le rechargement de la page
  
      const formData = new FormData(loginForm);
  
      fetch("login.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert("Connexion réussie !");
          window.location.reload(); // Rafraîchir la page ou rediriger
        } else {
          alert(data.message || "Identifiants incorrects.");
        }
      })
      .catch(error => console.error("Erreur :", error));
    });
  });