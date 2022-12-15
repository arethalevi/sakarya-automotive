var mergependapatan = [].concat(pendapatan2021, pendapatan2022);
var mergebulan = ["Jan 21","Feb 21","March 21","April 21","May 21","June 21","July 21","Aug 21","Sept 21","Oct 21","Nov 21","Des 21",
"Jan 22","Feb 22","March 22","April 22","May 22","June 22","July 22","Aug 22","Sept 22","Oct 22","Nov 22","Des 22"]

const group = (step, arr) =>
    Array.from({length: Math.ceil(arr.length/step)}, (_, i) =>
        arr.slice(i*step, (i+1)*step).reduce((a, b) => a+b));
var quart = group(3,mergependapatan);
var quart_cat = ['Q1 21',"Q2 21","Q3 21","Q4 21",'Q1 22',"Q2 22","Q3 22","Q4 22"]

let charthoho = Highcharts.chart('drilltime', {
    chart: {
      type: 'areaspline',
      zoomType:'x',
    },
    title: {
      text: 'Sales Revenue'
    },
    xAxis: {
      categories: mergebulan,
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Sales Revenue ($)'
      }
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      areaspline:{
        fillOpacity:"0.4"
      },
      series: {
        borderWidth: 0,
        allowPointSelect:true
      }
    },
  
    series: [{
        name: "Sales Revenue",
        color:"#178FFB",
        marker:{
          enabled:false
        },
        data: mergependapatan
      }
    ],
    credits: false
    
  });

var selecthoho = document.querySelector('#selectj');
selecthoho.addEventListener('change', (el) => {
    var jenis = el.target.value;
    var asli = [{name: "2021",y: ptotal21},{
      name: "2022",y: ptotal22}]

    if (jenis=="year"){
        charthoho.series[0].setData(asli);
        charthoho.xAxis[0].setCategories(['2021','2022']);
        charthoho.redraw()
      }
    if (jenis=="month"){
        charthoho.series[0].setData(mergependapatan);
        charthoho.xAxis[0].setCategories(mergebulan);
        charthoho.redraw()
      }
    if (jenis=="quarter"){
        charthoho.series[0].setData(quart);
        charthoho.xAxis[0].setCategories(quart_cat);
        charthoho.redraw()
      }  
    
});