Highcharts.chart('grafik_jumlahbarang', {
    title : {
        text : 'Number of Items Sold'
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
            name : '2021',
            data : jumlahbarang2021
        },
        {
            name : '2022',
            data : jumlahbarang2022
        }

    ],
    credits: false
});
