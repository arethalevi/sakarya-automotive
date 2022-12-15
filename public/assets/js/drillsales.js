//sum
var s_ydoor22 = sum(door_sales22);
var s_ylamp22 = sum(lamp_sales22);
var s_ywheel22 = sum(wheel_sales22);
var s_ywindow22 = sum(window_sales22);
var s_ydoor21 = sum(door_sales21);
var s_ylamp21 = sum(lamp_sales21);
var s_ywheel21 = sum(wheel_sales21);
var s_ywindow21 = sum(window_sales21);

//dd
var s_door22 = [door,door_sales22];
var s_lamp22 = [lamp,lamp_sales22];
var s_wheel22 = [wheel,wheel_sales22];
var s_window22 = [hwindow,window_sales22];
var s_door21 = [door,door_sales21];
var s_lamp21 = [lamp,lamp_sales21];
var s_wheel21 = [wheel,wheel_sales21];
var s_window21 = [hwindow,window_sales21];

var s_door22s = transpose(s_door22);
var s_lamp22s = transpose(s_lamp22);
var s_wheel22s = transpose(s_wheel22);
var s_window22s = transpose(s_window22);
var s_door21s = transpose(s_door21);
var s_lamp21s = transpose(s_lamp21);
var s_wheel21s = transpose(s_wheel21);
var s_window21s = transpose(s_window21);

let charthuhu = Highcharts.chart('drillsales', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Sales by Category'
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Total Items Sold'
      }
  
    },
    legend: {
      enabled: true
    },
    plotOptions: {
      series: {
        borderWidth: 0
      }
    },
  
    series: [
      {
        name: "2021",
        color: "#FEDB68",
        data: [
          {
            name: "Door",
            y: s_ydoor21,
            drilldown: "Door 2021"
          },
          {
            name: "Lamp",
            y: s_ylamp21,
            drilldown: "Lamp 2021"
          },
          {
            name: "Wheel",
            y: s_ywheel21,
            drilldown: "Wheel 2021"
          },
          {
            name: "Window",
            y: s_ywindow21,
            drilldown: "Window 2021"
          }
        ]
      },
      {
        name: "2022",
        color: "#F18226",
        data: [
          {
            name: "Door",
            y: s_ydoor22,
            drilldown: "Door 2022"
          },
          {
            name: "Lamp",
            y: s_ylamp22,
            drilldown: "Lamp 2022"
          },
          {
            name: "Wheel",
            y: s_ywheel22,
            drilldown: "Wheel 2022"
          },
          {
            name: "Window",
            y: s_ywindow22,
            drilldown: "Window 2022"
          }
        ]
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
          name: "Door 2022",
          id: "Door 2022",
          data: s_door22s
        },
        {
          name: "Lamp 2022",
          id: "Lamp 2022",
          data: s_lamp22s
        },
        {
          name: "Wheel 2022",
          id: "Wheel 2022",
          data: s_wheel22s
        },
        {
          name: "Window 2022",
          id: "Window 2022",
          data: s_window22s
        },
        {
          name: "Door 2021",
          id: "Door 2021",
          data: s_door21s
        },
        {
          name: "Lamp 2021",
          id: "Lamp 2021",
          data: s_lamp21s
        },
        {
          name: "Wheel 2021",
          id: "Wheel 2021",
          data: s_wheel21s
        },
        {
          name: "Window 2021",
          id: "Window 2021",
          data: s_window21s
        },
      ]
    },
    credits: false
  });

// var selecthuhu = document.querySelector('#selecthuhu');
// selecthuhu.addEventListener('change', (ei) => {
//     var thn = ei.target.value;
//     var satu = [{
//         name: "Door",
//         y: s_ydoor21,
//         drilldown: "Door21"},
//         {
//         name: "Lamp",
//         y: s_ylamp21,
//         drilldown: "Lamp21"},
//         {
//         name: "Wheel",
//         y: s_ywheel21,
//         drilldown: "Wheel21"},
//         {
//         name: "Window",
//         y: s_ywindow21,
//         drilldown: "Window21"}
//     ];
//     var dua = [{
//         name: "Door",
//         y: s_ydoor22,
//         drilldown: "Door"},
//       {
//         name: "Lamp",
//         y: s_ylamp22,
//         drilldown: "Lamp"},
//       {
//         name: "Wheel",
//         y: s_ywheel22,
//         drilldown: "Wheel"},
//       {
//         name: "Window",
//         y: s_ywindow22,
//         drilldown: "Window"}
//     ];

//     if (thn=="2021"){
//         charthuhu.series[0].setData(satu);
//         charthuhu.redraw()
//       }
//     if (thn=="2022"){
//         charthuhu.series[0].setData(dua);
//         charthuhu.redraw()
//       }
// });