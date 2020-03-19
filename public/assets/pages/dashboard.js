
/*
 Template Name: Veltrix - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard init js
 */


//Line chart with area

new Chartist.Line('#chart-with-area', {
    labels: ['Sept','Oct','Nov','Dec','Jan'],
    series: [
        [0, 112.50, 121.43, 145.50, 165.0]
    ]
    }, {
    low: 0,
    showArea: true,
    plugins: [
        Chartist.plugins.tooltip()
    ]
});


//Animating a Donut with Svg.animate

var chart = new Chartist.Pie('#ct-donut', {
    series: [54, 28, 17,],
    labels: [1, 2, 3]
  }, {
    donut: true,
    showLabel: false,
    plugins: [
      Chartist.plugins.tooltip()
    ]
  });

//donut
$('.peity-donut').each(function () {
    $(this).peity("donut", $(this).data());
});

// Peity line
$('.peity-line').each(function() {
    $(this).peity("line", $(this).data());
});



