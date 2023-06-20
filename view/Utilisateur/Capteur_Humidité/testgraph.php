<!DOCTYPE html>
<html>
<head>
  <title>Graphique</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    canvas {
      display: block;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <canvas id="graphique"></canvas>

  <script>
    $(document).ready(function() {
      // Fonction pour mettre à jour les données du graphique
      function updateData() {
        $.ajax({
          url: 'graph_humid.php',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
            var decValues = response.dec_values;
            var horValues = response.hor_values;

            // Mise à jour des données du graphique
            graphique.data.labels = horValues;
            graphique.data.datasets[0].data = decValues;
            graphique.update();
          },
          error: function() {
            console.log('Erreur lors de la récupération des données.');
          }
        });
      }

      // Configuration initiale du graphique
      var config = {
        type: 'line',
        data: {
          labels: [],
          datasets: [{
            label: 'Valeurs',
            data: [],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: 'Axe X'
              }
            },
            y: {
              display: true,
              title: {
                display: true,
                text: 'Axe Y'
              }
            }
          }
        }
      };

      // Création du graphique
      var ctx = document.getElementById('graphique').getContext('2d');
      var graphique = new Chart(ctx, config);

      // Rafraîchissement des données toutes les 0,5 secondes
      setInterval(updateData, 500);
    });
  </script>
</body>
</html>
