Highcharts.chart('top_produksi_2021', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Top 10 Number of Items Production 2021'
    },
    xAxis : {
        categories : produksi2021,
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
            data : top5_produksi_2021
        }

    ],
    credits: false
});
