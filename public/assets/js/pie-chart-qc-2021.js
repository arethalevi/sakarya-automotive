Highcharts.chart('grafik_qc_2021', {
    chart: {
        type: 'pie'
    },
    title : {
        text : 'QC Production 2021'
    },
    plotOptions: {
        pie: {
            colors: [
                '#24D8B6', 
                '#FC4560', 
                '#DDDF00', 
                '#24CBE5', 
                '#64E572', 
                '#FF9655', 
                '#FFF263', 
                '#6AF9C4'
              ],
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
          }
        }
    },
    series: [
        {
            name : 'QC Production',
            innerSize: '60%',
            data: [{
                name: 'Pass',
                y : qc_pass_2021
            },{
                name: 'No Pass',
                y : qc_no_pass_2021
            }
        ]
        }
        // {
        //     name : 'Items Production',
        //     data : jumlahproduksi2022
        // }

    ],
    credits: false
});
