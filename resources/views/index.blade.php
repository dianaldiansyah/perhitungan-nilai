<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
  <form action="/" method="post" style="display:inline-block">
    @csrf
    <h1>Hitung Nilai Akhir Mahasiswa</h1>
    Nama Mahasiswa : <br>
    <input type="text" name="nama"><br>
    Nilai Quiz : <br>
    <input type="text" name="quiz"><br>
    Nilai Tugas : <br>
    <input type="text" name="tugas"><br>
    Nilai Absensi : <br>
    <input type="text" name="absensi"><br>
    Nilai Praktek : <br>
    <input type="text" name="praktek"><br>
    Nilai UAS : <br>
    <input type="text" name="uas"><br>
    <br>
    <button type="submit">Submit</button>
  </form>
  <canvas id="myChart" style="width:100%;max-width:700px;display:inline-block;margin-left:100px"></canvas>
  <script>
    var json = "{!! json_encode($semuaNilai) !!}";
    var xValues = ["A", "B", "C", "D"];
    var yValues = [0, 5, 10, 15];
    var barColors = ["red", "green","blue","orange"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: JSON.parse(json)
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Chart Nilai Mahasiswa"
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 0,
              suggestedMax: 10
            }
          }]
        }
      }
    });
  </script>
</body>
</html>