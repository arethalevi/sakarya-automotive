@extends('layouts.admin.admin')

@section('style')
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Libre+Franklin:wght@500&family=Montserrat:wght@400;500;600&family=Nunito:wght@300;400&family=Playfair+Display:wght@700&family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<style>.card{
  border-radius: 5%;
}</style>
@endsection

@section('content')
    <!-- ROW ATAS -->
    <div class="row">
        <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h3>Welcome back, {{ Auth::user()->name }} </h3>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- KOTAK INFO -->
    <div class="row" style="padding-bottom:1.5rem;">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8 tul">
                <h4>Sales Revenue</h4>
                <h2 id="salrev"></h2>
                <div class="per"><i class="bi bi-arrow-up"></i>&nbsp;+<span id="p_inc"></span></div>
              </div>
              <div class="col-md-4">
                <i class="bi bi-wallet-fill kotak" style="background-color: rgba(237, 93, 92, 0.1); color: rgba(237, 93, 92, 1);"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8 tul">
                <h4>Quality Control</h4>
                <h2 id="qc"></h2>
                <div class="per"><i class="bi bi-arrow-up"></i>&nbsp;+<span id="qc_inc"></span></div>
              </div>
              <div class="col-md-4">
                <i class="bi bi-clipboard-check-fill kotak" style="background-color: rgba(253, 176, 25, 0.1); color: rgba(253, 176, 25, 1);"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8 tul">
                <h4>Production</h4>
                <h2 id="jp"></h2>
                <div class="no"><i class="bi bi-arrow-down"></i>&nbsp;<span id="jp_inc"></span></div>
              </div>
              <div class="col-md-4">
                <i class="bi bi-gear-wide-connected kotak" style="background-color: rgba(36, 216, 182, 0.1); color: rgba(36, 216, 182, 1);"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- FIRST DASHBOARD ROW  -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <select name="" id="selectj" class="form-select hana form-select-sm ms-auto">
                  <option value="month">Month</option>  
                  <option value="quarter">Quarter</option>
                  <option value="year">Year</option>  
                </select>
                <div id="drilltime"></div>
              </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <select name="" id="select" class="form-select hana form-select-sm ms-auto">
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>    
                  </select>
                  <div id="grafik_barang_terjualproduksi2022"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCTION -->
    <h3>Production</h3>
    <!-- <div class="row-gy-5">
      <div class="card">
        <div class="card-body">
          <select name="" id="selectiga" class="form-select hana form-select-sm ms-auto">
            <option value="2022">2022</option>
            <option value="2021">2021</option>    
          </select>
          <div id="top_produksi_2022"></div>
        </div>
      </div>
    </div> -->
    <div class="row" style="padding-top:0.5rem;">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <select name="" id="selecthehe" class="form-select hana form-select-sm ms-auto">
                <option value="2022">2022</option>
                <option value="2021">2021</option>    
              </select>
              <div id="drillproduksi"></div>
              </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <select name="" id="selecttiga" class="form-select hana form-select-sm ms-auto">
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>    
                </select>
                <div id="grafik_qc_2022"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- SALES -->
    <h3>Sales</h3>
    <div class="row gy-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 style="text-align:center;"><a href="">Top 5 Items Sold 2022</a></h4>
            
            <div id="tabel"></div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <div id="drillsales"></div>
            </div>
          </div>
      </div>
    </div>

    <p style="padding-left: 1rem;">
      <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Hidden
      </button>
    </p>
    <div class="collapse row" id="collapseExample">
      <div class="col-md-8">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3">
              <select name="" id="selecta" class="form-select  form-select-sm ms-auto">
                <option value="sold">Sold</option>
                <option value="produced">Produced</option>    
              </select>
            </div>
            <div class="col-md-3">
              <select name="" id="selectb" class="form-select  form-select-sm ms-auto">
                <option value="2022">2022</option>
                <option value="2021">2021</option>    
              </select>
            </div>
          </div>
          <div class="row">
            <div id="top_terjual_2022"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-body">
          <select name="" id="selectdua" class="form-select form-select-sm ms-auto" style="width: 60%;">
              <option value="revenue">Sales Revenue</option>
              <option value="sold">Number of Items Sold</option>    
              <option value="produced">Number of Items Produced</option>    
          </select>
          <div id="grafik_penjualan"></div>
        </div>
      </div>
    </div>

@endsection

@section('codejs')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
  function sum(array) {
      let sum = 0;
      array.forEach(item => {sum += item;});
      return sum;
    }
    function transpose(a) {
    return Object.keys(a[0]).map(function(c) {
        return a.map(function(r) { return r[c]; });
    });
    }

    var pendapatan2021 = <?php echo json_encode($total_harga_2021) ?>;
    var pendapatan2022 = <?php echo json_encode($total_harga_2022) ?>;
    var jumlahbarang2021 = <?php echo json_encode($jumlah_barang_2021) ?>;
    var jumlahbarang2022 = <?php echo json_encode($jumlah_barang_2022) ?>;
    var jumlahproduksi2021 = <?php echo json_encode($jumlah_produksi_2021) ?>;
    var jumlahproduksi2022 = <?php echo json_encode($jumlah_produksi_2022) ?>;
    var qc_pass_2022 = <?php echo json_encode($qc_pass_2022[0]) ?>;
    var qc_no_pass_2022 = <?php echo json_encode($qc_no_pass_2022[0]) ?>;
    var qc_pass_2021 = <?php echo json_encode($qc_pass_2021[0]) ?>;
    var qc_no_pass_2021 = <?php echo json_encode($qc_no_pass_2021[0]) ?>;

    var top5_barang_2021 = <?php echo json_encode($top5_barang_2021) ?>;
    var top5_barang_2022 = <?php echo json_encode($top5_barang_2022) ?>;
    var top5_produksi_2021 = <?php echo json_encode($top5_produksi_2021) ?>;
    var top5_produksi_2022 = <?php echo json_encode($top5_produksi_2022) ?>;
    // var category_terjual_2022 = <?php echo json_encode($category_terjual_2022) ?>;
    // var category_terjual_2021 = <?php echo json_encode($category_terjual_2021) ?>;
    // var category_produksi_2022 = <?php echo json_encode($category_produksi_2022) ?>;
    // var category_produksi_2021 = <?php echo json_encode($category_produksi_2021) ?>;

    var bulan = <?php echo json_encode($bulan) ?>;
    var barang2021 = <?php echo json_encode($barang_2021) ?>;
    var barang2022 = <?php echo json_encode($barang_2022) ?>;
    var produksi2021 = <?php echo json_encode($produksi_2021) ?>;
    var produksi2022 = <?php echo json_encode($produksi_2022) ?>;
    var category = <?php echo json_encode($category) ?>;
    
    // nama barang
    var door = <?php echo json_encode($door_production_sales) ?>;
    var lamp = <?php echo json_encode($lamp_production_sales) ?>;
    var hwindow = <?php echo json_encode($window_production_sales) ?>;
    var wheel = <?php echo json_encode($wheel_production_sales) ?>;

    // production 2022
    var door_prod22 = <?php echo json_encode($door_production_2022) ?>;
    var lamp_prod22 = <?php echo json_encode($lamp_production_2022) ?>;
    var window_prod22 = <?php echo json_encode($window_production_2022) ?>;
    var wheel_prod22 = <?php echo json_encode($wheel_production_2022) ?>;

    // production 2021
    var door_prod21 = <?php echo json_encode($door_production_2021) ?>;
    var lamp_prod21 = <?php echo json_encode($lamp_production_2021) ?>;
    var window_prod21 = <?php echo json_encode($window_production_2021) ?>;
    var wheel_prod21 = <?php echo json_encode($wheel_production_2021) ?>;

    // sales 2022
    var door_sales22 = <?php echo json_encode($door_sales_2022) ?>;
    var lamp_sales22 = <?php echo json_encode($lamp_sales_2022) ?>;
    var window_sales22 = <?php echo json_encode($window_sales_2022) ?>;
    var wheel_sales22 = <?php echo json_encode($wheel_sales_2022) ?>;

    // sales 2021
    var door_sales21 = <?php echo json_encode($door_sales_2021) ?>;
    var lamp_sales21 = <?php echo json_encode($lamp_sales_2021) ?>;
    var window_sales21 = <?php echo json_encode($window_sales_2021) ?>;
    var wheel_sales21 = <?php echo json_encode($wheel_sales_2021) ?>;

    var gab = [barang2021,top5_barang_2021];
    var sgab = transpose(gab);

    
    // kotak1
    var qc_per22 = ((qc_pass_2022/(qc_pass_2022+qc_no_pass_2022))*100).toFixed(2); 
    var qc_per21 = ((qc_pass_2021/(qc_pass_2021+qc_no_pass_2021))*100).toFixed(2);
    var qc_increase = (qc_per22 -qc_per21).toFixed(2);
    document.getElementById("qc").innerHTML = qc_per22 + '%';
    document.getElementById("qc_inc").innerHTML = qc_increase + '%';

    // kotak2
    var ptotal22 = sum(pendapatan2022);
    var ptotal21 = sum(pendapatan2021);
    var p_inc = (((ptotal22-ptotal21)/ptotal21)*100).toFixed(2);
    document.getElementById("salrev").innerHTML = '$'+ptotal22.toLocaleString();
    document.getElementById("p_inc").innerHTML = p_inc + '%';

    // kotak3
    var jp22 = sum(jumlahproduksi2022);
    var jp21 = sum(jumlahproduksi2021);
    var jp_inc = (((jp22-jp21)/jp21)*100).toFixed(2);
    document.getElementById("jp").innerHTML = jp22.toLocaleString();
    document.getElementById("jp_inc").innerHTML = jp_inc + '%';

    // tabel
    var gab = [barang2022,top5_barang_2022];
    var sgab = transpose(gab);

    function makeTableHTML(myArray) {
        var result = "<table><tr><th>Product Name</th><th>Sold</th></tr>";
        for(var i=0; i<myArray.length; i++) {
            result += "<tr>";
            for(var j=0; j<myArray[i].length; j++){
                result += "<td>"+myArray[i][j]+"</td>";}
            result += "</tr>";}
        result += "</table>";
        return result;}
    document.getElementById('tabel').innerHTML= makeTableHTML(sgab);

    
</script>
<script src="assets/js/drilltime.js"></script> <!-- drilltime -->
<script src="assets/js/column-chart-terjualproduksi-2022.js"></script> <!-- [s] grafik_barang_terjualproduksi2022 -->
<script src="assets/js/pie-chart-qc-2022.js"></script> <!-- grafik_qc_2022 -->
<script src="assets/js/drillproduksi.js"></script> <!-- drillproduksi -->
<script src="assets/js/drillsales.js"></script> <!-- drillsales -->
<!-- hidden -->
<script src="assets/js/top10_terjual_2022.js"></script>
<script src="assets/js/line-chart-penjualan.js"></script> 
<!-- <script src="assets/js/top10_produksi_2022.js"></script> -->
<!-- <script src="assets/js/category-produksi.js"></script>  -->
<!-- <script src="assets/js/pie-chart-qc-2021.js"></script>  -->
<!-- <script src="assets/js/category-terjual.js"></script>  -->
@endsection