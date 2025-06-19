(function ($) {
  'use strict';
  $(function () {

    Chart.defaults.global.legend.labels.usePointStyle = true;

    if ($("#serviceSaleProgress").length) {
      var bar = new ProgressBar.Circle(serviceSaleProgress, {
        color: 'url(#gradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.65);  // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      let linearGradient = '<defs><linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="20%" stop-color="#da8cff"/><stop offset="50%" stop-color="#9a55ff"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
    }
    if ($("#productSaleProgress").length) {
      var bar = new ProgressBar.Circle(productSaleProgress, {
        color: 'url(#productGradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.6);  // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      let linearGradient = '<defs><linearGradient id="productGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="40%" stop-color="#36d7e8"/><stop offset="70%" stop-color="#b194fa"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
    }
    if ($("#points-chart").length) {
      var ctx = document.getElementById('points-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          datasets: [
            {
              label: "North Zone",
              borderColor: gradientStrokeViolet,
              backgroundColor: gradientStrokeViolet,
              hoverBackgroundColor: gradientStrokeViolet,
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [20, 40, 15, 35, 25, 50, 30, 20]
            },
            {
              label: "South Zone",
              borderColor: '#e9eaee',
              backgroundColor: '#e9eaee',
              hoverBackgroundColor: '#e9eaee',
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [40, 30, 20, 10, 50, 15, 35, 20]
            }
          ]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 10
              },
              gridLines: {
                drawBorder: false,
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: '#eeeeee'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true,
              },
              barPercentage: 0.7
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      })
    }
    if ($("#events-chart").length) {
      var ctx = document.getElementById('events-chart').getContext("2d");

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          datasets: [
            {
              label: "Domestic",
              borderColor: gradientStrokeBlue,
              backgroundColor: gradientStrokeBlue,
              hoverBackgroundColor: gradientStrokeBlue,
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [20, 40, 15, 35, 25, 50, 30, 20]
            },
            {
              label: "International",
              borderColor: '#e9eaee',
              backgroundColor: '#e9eaee',
              hoverBackgroundColor: '#e9eaee',
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [40, 30, 20, 10, 50, 15, 35, 20]
            }
          ]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 10
              },
              gridLines: {
                drawBorder: false,
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: '#eeeeee'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true,
              },
              barPercentage: 0.7
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      })
    }
    if ($("#visit-sale-chart").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('visit-sale-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      fetch('/admin/chart-category-monthly')
        .then(res => res.json())
        .then(result => {
          const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

          const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [
                {
                  label: "Áo",
                  data: result["Áo"] || [],
                  borderColor: gradientStrokeViolet,
                  backgroundColor: gradientStrokeViolet,
                  hoverBackgroundColor: gradientStrokeViolet,
                  legendColor: gradientLegendViolet,
                  pointRadius: 0,
                  borderWidth: 1,
                  fill: 'origin'
                },
                {
                  label: "Quần",
                  data: result["Quần"] || [],
                  borderColor: gradientStrokeRed,
                  backgroundColor: gradientStrokeRed,
                  hoverBackgroundColor: gradientStrokeRed,
                  legendColor: gradientLegendRed,
                  pointRadius: 0,
                  borderWidth: 1,
                  fill: 'origin'
                },
                {
                  label: "Giày",
                  data: result["Giày"] || [],
                  borderColor: gradientStrokeBlue,
                  backgroundColor: gradientStrokeBlue,
                  hoverBackgroundColor: gradientStrokeBlue,
                  legendColor: gradientLegendBlue,
                  pointRadius: 0,
                  borderWidth: 1,
                  fill: 'origin'
                }
              ]
            },
            options: {
              responsive: true,
              legend: false,
              legendCallback: function (chart) {
                var text = [];
                text.push('<ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  text.push('<li><span class="legend-dots" style="background:' +
                    chart.data.datasets[i].legendColor +
                    '"></span>');
                  if (chart.data.datasets[i].label) {
                    text.push(chart.data.datasets[i].label);
                  }
                  text.push('</li>');
                }
                text.push('</ul>');
                return text.join('');
              },
              scales: {
                yAxes: [{
                  ticks: {
                    display: false,
                    min: 0,
                    stepSize: 20,
                    max: 80
                  },
                  gridLines: {
                    drawBorder: false,
                    color: 'rgba(235,237,242,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  }
                }],
                xAxes: [{
                  gridLines: {
                    display: false,
                    drawBorder: false,
                    color: 'rgba(0,0,0,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  },
                  ticks: {
                    padding: 20,
                    fontColor: "#9c9fa6",
                    autoSkip: true,
                  },
                  categoryPercentage: 0.5,
                  barPercentage: 0.5
                }]
              },
              elements: {
                point: {
                  radius: 0
                }
              }
            }
          });

          $("#visit-sale-chart-legend").html(myChart.generateLegend());
        });
    }
    if ($("#visit-sale-chart-dark").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('visit-sale-chart-dark').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
          datasets: [
            {
              label: "CHN",
              borderColor: gradientStrokeViolet,
              backgroundColor: gradientStrokeViolet,
              hoverBackgroundColor: gradientStrokeViolet,
              legendColor: gradientLegendViolet,
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [20, 40, 15, 35, 25, 50, 30, 20]
            },
            {
              label: "USA",
              borderColor: gradientStrokeRed,
              backgroundColor: gradientStrokeRed,
              hoverBackgroundColor: gradientStrokeRed,
              legendColor: gradientLegendRed,
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [40, 30, 20, 10, 50, 15, 35, 40]
            },
            {
              label: "UK",
              borderColor: gradientStrokeBlue,
              backgroundColor: gradientStrokeBlue,
              hoverBackgroundColor: gradientStrokeBlue,
              legendColor: gradientLegendBlue,
              pointRadius: 0,
              fill: false,
              borderWidth: 1,
              fill: 'origin',
              data: [70, 10, 30, 40, 25, 50, 15, 30]
            }
          ]
        },
        options: {
          responsive: true,
          legend: false,
          legendCallback: function (chart) {
            var text = [];
            text.push('<ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {
              text.push('<li><span class="legend-dots" style="background:' +
                chart.data.datasets[i].legendColor +
                '"></span>');
              if (chart.data.datasets[i].label) {
                text.push(chart.data.datasets[i].label);
              }
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join('');
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 20,
                max: 80
              },
              gridLines: {
                drawBorder: false,
                color: '#322f2f',
                zeroLineColor: '#322f2f'
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: 'rgba(235,237,242,1)'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true,
              },
              categoryPercentage: 0.5,
              barPercentage: 0.5
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      })
      $("#visit-sale-chart-legend-dark").html(myChart.generateLegend());
    }
    if ($("#traffic-chart").length) {
      var ctx1 = document.getElementById('traffic-chart').getContext("2d");

      // Khởi tạo các gradient
      var gradientStrokeBlue = ctx1.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx1.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx1.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';

      // Fetch dữ liệu cấu trúc loại hàng từ server
      fetch('/admin/chart-category-structure')
        .then(res => res.json())
        .then(result => {
          // result.categories = ["Áo","Quần","Giày"]
          // result.totals     = [120,  80,   50]

          var trafficChartData = {
            labels: result.categories,
            datasets: [{
              data: result.totals,
              backgroundColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed
              ],
              hoverBackgroundColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed
              ],
              borderColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed
              ],
              legendColor: [
                gradientLegendBlue,
                gradientLegendGreen,
                gradientLegendRed
              ]
            }]
          };

          var trafficChartOptions = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: false,
            legendCallback: function (chart) {
              var text = [];
              text.push('<ul>');
              for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<li><span class="legend-dots" style="background:' +
                  chart.data.datasets[0].legendColor[i] +
                  '"></span>');
                if (chart.data.labels[i]) {
                  text.push(chart.data.labels[i]);
                }
                text.push('<span class="float-right">' +
                  chart.data.datasets[0].data[i] + '%' +
                  '</span>');
                text.push('</li>');
              }
              text.push('</ul>');
              return text.join('');
            }
          };

          var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
          var trafficChart = new Chart(trafficChartCanvas, {
            type: 'doughnut',
            data: trafficChartData,
            options: trafficChartOptions
          });
          $("#traffic-chart-legend").html(trafficChart.generateLegend());
        })
        .catch(err => console.error('Lấy dữ liệu chart-category-structure thất bại:', err));
    }

    if ($("#inline-datepicker").length) {
      $('#inline-datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
      });
    }
  });
})(jQuery);
