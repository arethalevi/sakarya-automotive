Highcharts.chart('grafik_produksi', {
    title : {
        text : 'Number of Items Production'
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
            data : jumlahproduksi2021
        },
        {
            name : '2022',
            data : jumlahproduksi2022
        }

    ],
    credits: false
});
