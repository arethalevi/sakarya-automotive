let chart = Highcharts.chart('grafik_barang_terjualproduksi2022', {
    chart: {
        type: 'column'
    },
    title : {
        text : 'Number of Items Produced Vs Items Sold 2022'
    },
    xAxis : {
        categories : bulan,
        gridLineWidth: 0
    },
    yAxis : {
        title : {
            text : 'Number of Items'
        },
        gridLineWidth: 0
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        },
    },
    series: [
        {
            name : 'Items Produced',
            color: '#178FFB',
            data: $.extend(true, [], jumlahproduksi2022)
        },
        {
            name : 'Items Sold',
            color: '#24D8B6',
            data: $.extend(true, [], jumlahbarang2022)
        }

    ],
    credits: false
});


var select = document.querySelector('#select');
select.addEventListener('change', (event) => {
  var year = event.target.value;

  if (year=="2021"){
    chart.series[0].setData(jumlahproduksi2021);
    chart.series[1].setData(jumlahbarang2021);
    chart.setTitle({text: "Number of Items Produced Vs Items Sold 2021"});
    chart.redraw()
  }
  if (year=="2022"){
    chart.series[0].setData(jumlahproduksi2022);
    chart.series[1].setData(jumlahbarang2022);
    chart.setTitle({text: "Number of Items Produced Vs Items Sold 2022"});
    chart.redraw()
  }
});