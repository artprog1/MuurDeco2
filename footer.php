



</script>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <!-- Dashboards -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>


<?php
// $result = mysqli_query($conn, $sql);

// echo $data['total'];


$Ventas = $dataVentas['total'];
$Logisitca = $dataLogistica['total'];
$Diseno = $dataDiseno['total'];
$Produccion = $dataProduccion['total'];
$Direccion = $dataDireccion['total'];
// COUNT(*)
// SELECT COUNT(*) FROM tblProyectos WHERE departamentoAsignado = 103;   Ventas
// SELECT COUNT(*) FROM tblProyectos WHERE departamentoAsignado = 106;   Logisitca
// SELECT COUNT(*) FROM tblProyectos WHERE departamentoAsignado = 107;   Diseno
// SELECT COUNT(*) FROM tblProyectos WHERE departamentoAsignado = 108;   Produccion
// SELECT COUNT(*) FROM tblProyectos WHERE departamentoAsignado = 109;   Direccion

 ?>
  var ventas = <?php echo json_encode($Ventas); ?>;
  var logs = <?php echo json_encode($Logisitca); ?>;
  var disno = <?php echo json_encode($Diseno); ?>;
  var prod = <?php echo json_encode($Produccion); ?>;
  var direccion = <?php echo json_encode($Direccion); ?>;

  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Ventas', 'Logistica', 'Diseño', 'Producción', 'Dirección'],
          datasets: [{
              label: 'Cantidad: ',
              data: [ventas, logs, disno, prod, direccion],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',

                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',

                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
  <!-- JS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">

    </script>


</body>
</html>
