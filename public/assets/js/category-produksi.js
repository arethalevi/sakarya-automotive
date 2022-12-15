let chartl = Highcharts.chart('top_produksi_category', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Number of Production by Category'
    },
    xAxis : {
        categories : category,
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
            name : '2021',
            data : $.extend(true, [], category_produksi_2021)
        },
        {
            name : '2022',
            data : $.extend(true, [], category_produksi_2022)
        }

    ],
    credits: false
});


var selectl = document.querySelector('#selectl');
selectl.addEventListener('change', (ell) => {
  var type = ell.target.value;

  if (type=="prod"){
    chartl.series[0].setData(category_produksi_2021);
    chartl.series[1].setData(category_produksi_2022);
    chartl.setTitle({text: "Number of Production by Category"});
    chartl.redraw()
  }
  if (type=="sold"){
    chartl.series[0].setData(category_terjual_2021);
    chartl.series[1].setData(category_terjual_2022);
    chartl.setTitle({text: "Number of Items Sold by Category"});
    chartl.redraw()
  }
});