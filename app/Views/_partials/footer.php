<?php 
if(isset($grafik)){
foreach($grafik as $data){
    $total[] = $data['total'];
    $month[] = $data['month'];
}
}
?>
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
 
<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        Email : harlipandy16@gmail.com
    </div>
    <strong>Copyright©Lilipharlipandy <a href="<?php echo base_url('/'); ?>">Toko Sparepart Handphone</a>.</strong>
</footer>
</div>
<?php if(isset($grafik)){?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>
var chart = document.getElementById("myChart").getContext('2d');
var areaChart = new Chart(chart, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($month); ?>,
    datasets: [
      {
        label: "Grafik Penjualan",
        data: <?php echo json_encode($total); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 253, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 255, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 253, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 255, 255, 1)',
          'rgba(255, 159, 64, 1)',
        ],
        borderWidth: 1
      }
    ]
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginZero: true
          }
        }
      ]
    }
  }
});
</script>
<?php } ?>
</body>
</html>