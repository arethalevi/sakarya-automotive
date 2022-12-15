let chartdua = Highcharts.chart('grafik_penjualan', {
    chart : {type: 'line', zoomType:'x'},
    title : {text : 'Sales Revenue'},
    xAxis : {categories : bulan,gridLineWidth: 0},
    yAxis : {title : {text : 'Sales Revenue ($)'},gridLineWidth: 0},
    plotOptions: {series: {allowPointSelect: true}},
    series: [{
            name : '2021',
            color: '#d5723a',
            data: $.extend(true, [], pendapatan2021)},
        {
            name : '2022',
            color: '#6f5fa8',
            data: $.extend(true, [], pendapatan2022)}],
    credits: false});


var selectdua = document.getElementById('selectdua');
selectdua.addEventListener('change', (ey) => {
  var val = ey.target.value;

  if (val=="revenue"){
    chartdua.series[0].setData(pendapatan2021);
    chartdua.series[1].setData(pendapatan2022);
    chartdua.setTitle({text: "Sales Revenue ($)"});
    chartdua.yAxis[0].setTitle({text: "Sales Revenue ($)"});
    chartdua.redraw()
  }
  if (val=="sold"){
    chartdua.series[0].setData(jumlahbarang2021);
    chartdua.series[1].setData(jumlahbarang2022);
    chartdua.setTitle({text: "Number of Items Sold"});
    chartdua.yAxis[0].setTitle({text: "Number of Items"});
    chartdua.redraw()
  }
  if (val=="produced"){
    chartdua.series[0].setData(jumlahproduksi2021);
    chartdua.series[1].setData(jumlahproduksi2022);
    chartdua.setTitle({text: "Number of Items Produced"});
    chartdua.yAxis[0].setTitle({text: "Number of Items"});
    chartdua.redraw()
  }
});