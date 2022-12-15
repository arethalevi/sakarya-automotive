let chartiga = Highcharts.chart('top_produksi_2022', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Top 10 Number of Items Production 2022'
    },
    xAxis : {
        categories : produksi2022,
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
            name : 'Items Production',
            data : top5_produksi_2022
        }

    ],
    credits: false
});

var selectiga = document.getElementById('selectiga');
selectiga.addEventListener('change', (eq) => {
  var yea = eq.target.value;

  if (yea=="2021"){
    chartiga.series[0].setData(top5_produksi_2021);
    chartiga.xAxis[0].setCategories(produksi2021);
    chartiga.setTitle({text: "Top 10 Number of Items Produced 2021"});
    chartiga.redraw()
  }
  if (yea=="2022"){
    chartiga.series[0].setData(top5_produksi_2022);
    chartiga.xAxis[0].setCategories(produksi2022);
    chartiga.setTitle({text: "Top 10 Number of Items Produced 2022"});
    chartiga.redraw()
  }
});