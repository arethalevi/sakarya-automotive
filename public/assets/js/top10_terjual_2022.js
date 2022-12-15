let chartf = Highcharts.chart('top_terjual_2022', {
    chart: {
        type: 'bar'
    },
    title : {
        text : 'Top 10 Number of Items Sold 2022'
    },
    xAxis : {
        categories : $.extend(true, [], barang2022),
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
            color: "#aaddce",
            data : $.extend(true, [], top5_barang_2022)
        }

    ],
    credits: false
});


// var selectempat = document.getElementById('selectempat');
// selectempat.addEventListener('change', (ew) => {
//   var ye = ew.target.value;

//   if (ye=="2021"){
//     chartempat.series[0].setData(top5_barang_2021);
//     chartempat.xAxis[0].setCategories(barang2021);
//     chartempat.setTitle({text: "Top 10 Number of Items Sold 2021"});
//     chartempat.redraw()
//   }
//   if (ye=="2022"){
//     chartempat.series[0].setData(top5_barang_2022);
//     chartempat.xAxis[0].setCategories(barang2022);
//     chartempat.setTitle({text: "Top 10 Number of Items Sold 2022"});
//     chartempat.redraw()
//   }
// });


$("#selecta, #selectb").change(function() {
    selecta = $('#selecta').val();
    selectb = $('#selectb').val();
    if (selecta=="sold" && selectb=="2022"){
        chartf.series[0].setData(top5_barang_2022);
        chartf.xAxis[0].setCategories(barang2022);
        chartf.setTitle({text: "Top 10 Number of Items Sold 2022"});
        chartf.redraw();
    }
    if (selecta=="sold" && selectb=="2021"){
        chartf.series[0].setData(top5_barang_2021);
        chartf.xAxis[0].setCategories(barang2021);
        chartf.setTitle({text: "Top 10 Number of Items Sold 2021"});
        chartf.redraw();
    }
    if (selecta=="produced" && selectb=="2022"){
        chartf.series[0].setData(top5_produksi_2022);
        chartf.xAxis[0].setCategories(barang2022);
        chartf.setTitle({text: "Top 10 Number of Items Produced 2022"});
        chartf.redraw();
    }
    if (selecta=="produced" && selectb=="2021"){
        chartf.series[0].setData(top5_produksi_2021);
        chartf.xAxis[0].setCategories(barang2021);
        chartf.setTitle({text: "Top 10 Number of Items Produced 2021"});
        chartf.redraw();
    }
});

