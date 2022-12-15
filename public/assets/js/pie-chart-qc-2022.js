let charttiga = Highcharts.chart('grafik_qc_2022', {
    chart: {
        type: 'pie'
    },
    title : {
        text : 'QC Production 2022'
    },
    plotOptions: {
        pie: {
            colors: [
                '#24D8B6', 
                '#ED5D5C', 
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
                y : qc_pass_2022
            },{
                name: 'No Pass',
                y : qc_no_pass_2022
            }
        ]
        }
    ],
    
    credits: false
});




var selecttiga = document.querySelector('#selecttiga');
selecttiga.addEventListener('change', (eg) => {
  var tahun = eg.target.value;
  var duasatu = [{
    name: 'Pass',
    y : qc_pass_2021},
    {
    name: 'No Pass',
    y : qc_no_pass_2021}
  ];
  var duadua = [{
    name: 'Pass',
    y : qc_pass_2022},
    {
    name: 'No Pass',
    y : qc_no_pass_2022}
  ];

  if (tahun=="2021"){
    charttiga.series[0].setData(duasatu);
    charttiga.setTitle({text: "QC Production 2021"});
    charttiga.redraw()
  }
  if (tahun=="2022"){
    charttiga.series[0].setData(duadua);
    charttiga.setTitle({text: "QC Production 2022"});
    charttiga.redraw()
  }
});