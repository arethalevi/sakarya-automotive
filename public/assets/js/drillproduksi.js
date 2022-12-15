//sum
var ydoor22 = sum(door_prod22);
var ylamp22 = sum(lamp_prod22);
var ywheel22 = sum(wheel_prod22);
var ywindow22 = sum(window_prod22);
var ydoor21 = sum(door_prod21);
var ylamp21 = sum(lamp_prod21);
var ywheel21 = sum(wheel_prod21);
var ywindow21 = sum(window_prod21);

//dd
var door22 = [door,door_prod22];
var lamp22 = [lamp,lamp_prod22];
var wheel22 = [wheel,wheel_prod22];
var window22 = [hwindow,window_prod22];
var door21 = [door,door_prod21];
var lamp21 = [lamp,lamp_prod21];
var wheel21 = [wheel,wheel_prod21];
var window21 = [hwindow,window_prod21];

var door22s = transpose(door22);
var lamp22s = transpose(lamp22);
var wheel22s = transpose(wheel22);
var window22s = transpose(window22);
var door21s = transpose(door21);
var lamp21s = transpose(lamp21);
var wheel21s = transpose(wheel21);
var window21s = transpose(window21);

let charthehe = Highcharts.chart('drillproduksi', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Production by Category'
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Total Produced Items'
      }
  
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      bar:{
        colors:[
         "#FDB019",
         "#178FFB",
         "#FC4560",
         "#775DD0",
         "#24D8B6",
         "#FFF000"

        ]

      },
      series: {
        borderWidth: 0,
        allowPointSelect:true,
        dataLabels: {
          enabled: true
        }
      }
    },
  
    series: [{
        name: "Category",
        colorByPoint:true,
        data: [{
            name: "Door",
            y: ydoor22,
            drilldown: "Door"
          },{
            name: "Lamp",
            y: ylamp22,
            drilldown: "Lamp"
          },{
            name: "Wheel",
            y: ywheel22,
            drilldown: "Wheel"
          },{
            name: "Window",
            y: ywindow22,
            drilldown: "Window"
          }]
      }
    ],
    drilldown: {
      breadcrumbs: {
        position: {
          align: 'right'
        }
      },
      series: [
        {
          name: "Door",
          id: "Door",
          data: door22s
        },
        {
          name: "Lamp",
          id: "Lamp",
          data: lamp22s
        },
        {
          name: "Wheel",
          id: "Wheel",
          data: wheel22s
        },
        {
          name: "Window",
          id: "Window",
          data: window22s
        },
        {
          name: "Door21",
          id: "Door21",
          data: door21s
        },
        {
          name: "Lamp21",
          id: "Lamp21",
          data: lamp21s
        },
        {
          name: "Wheel21",
          id: "Wheel21",
          data: wheel21s
        },
        {
          name: "Window21",
          id: "Window21",
          data: window21s
        },
      ]
    },
    credits: false
  });

var selecthehe = document.querySelector('#selecthehe');
selecthehe.addEventListener('change', (ep) => {
    var th = ep.target.value;
    var satu = [{
        name: "Door",
        y: ydoor21,
        drilldown: "Door21"},
        {
        name: "Lamp",
        y: ylamp21,
        drilldown: "Lamp21"},
        {
        name: "Wheel",
        y: ywheel21,
        drilldown: "Wheel21"},
        {
        name: "Window",
        y: ywindow21,
        drilldown: "Window21"}
    ];
    var dua = [{
        name: "Door",
        y: ydoor22,
        drilldown: "Door"},
      {
        name: "Lamp",
        y: ylamp22,
        drilldown: "Lamp"},
      {
        name: "Wheel",
        y: ywheel22,
        drilldown: "Wheel"},
      {
        name: "Window",
        y: ywindow22,
        drilldown: "Window"}
    ];

    if (th=="2021"){
        charthehe.series[0].setData(satu);
        charthehe.redraw()
      }
    if (th=="2022"){
        charthehe.series[0].setData(dua);
        charthehe.redraw()
      }
});