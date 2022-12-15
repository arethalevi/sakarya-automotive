Highcharts.chart('top_terjual_2021', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Top 10 Number of Items Sold 2021'
    },
    xAxis : {
        categories : barang2021,
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
            name : 'Items Sold',
            data : top5_barang_2021
        }

    ],
    credits: false
});
