Highcharts.chart('top_penjualan_category', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Number of Items Sold by Category'
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
            data : category_terjual_2021
        },
        {
            name : '2022',
            data : category_terjual_2022
        }

    ],
    credits: false
});
