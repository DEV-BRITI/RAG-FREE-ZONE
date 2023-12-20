// BAR CHART CODE
var barChartOptions = {
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false,
        },
    },
    colors: [
        '#2962ff',
        '#2e7d32',
        '#d50000',
    ],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Dec', 'Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'July', 'Aug'],
    },
    yaxis: {
        title: {
            text: 'COMPLAINTS',
        },
        labels: {},
    },
    fill: {
        opacity: 1
    },
    grid: {
        borderColor: "#474747",
        yaxis: {
            lines: {
                show: true,
            },
        },
        xaxis: {
            lines: {
                show: true,
            },
        },
    },
    legend: {
        show: true,
        position: "bottom",
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return '' + val + ''
            }
        }
    }
  };
  
  // Fetch data using AJAX
  fetch('../getChartData.php')
      .then(response => response.json())
      .then(data => {
          barChartOptions.series = [
              {
                  name: 'TOTAL REGISTERED COMPLAINTS',
                  data: data.map(entry => entry.totalRegisteredComplaints),
              },
              {
                  name: 'INFORMED COMPLAINTS',
                  data: data.map(entry => entry.informedComplaints),
              },
              {
                  name: 'REJECTED COMPLAINTS',
                  data: data.map(entry => entry.rejectedComplaints),
              },
              // ... (other series)
          ];
  
          // Render the bar chart
          var barchart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
          barchart.render();
      })
      .catch(error => console.error('Error fetching data:', error));
  
  
  
  
  // AREA CHART
  var areaChartOptions = {
    series: [{
        name: "INFORMED COMPLAINTS",
        data: [], // Initially, the data is an empty array
    }, {
        name: "PENDING TO INFORM",
        data: [],
    }],
    chart: {
        type: "area",
        background: "transparent",
        height: 350,
        stacked: false,
        toolbar: {
            show: false,
        },
    },
    colors: ["#00ab57", "#d50000"],
    labels: ["Dec","Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    dataLabels: {
        enabled: false,
    },
    fill: {
        gradient: {
            opacityFrom: 0.4,
            opacityTo: 0.1,
            shadeIntensity: 1,
            stops: [0, 100],
            type: "vertical",
        },
        type: "gradient",
    },
    grid: {
        borderColor: "#474747",
        yaxis: {
            lines: {
                show: true,
            },
        },
        xaxis: {
            lines: {
                show: true,
            },
        },
    },
    legend: {
        show: true,
        position: "bottom",
    },
    markers: {
        size: 6,
        strokeColors: "#1b2635",
        strokeWidth: 3,
    },
    stroke: {
        curve: "smooth",
    },
    xaxis: {
        axisBorder: {
            color: "#55596e",
            show: true,
        },
        axisTicks: {
            color: "#55596e",
            show: true,
        },
        labels: {
            offsetY: 5,
        },
    },
    yaxis: [{
        title: {
            text: "TOTAL COMPLAINTS",
        },
    }, {
        opposite: true,
        title: {
            text: "INFORMED COMPLAINTS",
        },
    }],
    tooltip: {
        shared: true,
        intersect: false,
        theme: "dark",
    }
  };
  
  // Fetch data using AJAX
  fetch('getChartData.php')
    .then(response => response.json())
    .then(data => {
        areaChartOptions.series = [
            {
                name: "INFORMED COMPLAINTS",
                data: data.map(entry => entry.informedComplaints),
            },
            {
                name: "PENDING TO INFORM",
                data: data.map(entry => entry.pendingToInform),
            },
            // ... (other series)
        ];
  
        // Render the area chart
        var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
        areaChart.render();
    })
    .catch(error => console.error('Error fetching data:', error));
  
  
  
  // AREA2 CHART
  var area2ChartOptions = {
    series: [{
      name: 'COMPLAINTS INFORMED',
      data: [], // Initially, the data is an empty array
    }, {
      name: 'PENDING TO INFORM',
      data: [],
    }],
    chart: {
      height: 350,
      type: 'area',
      toolbar: {
        show: false,
      },
    },
    colors: ["#4f35a1", "#246dec"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: 'smooth'
    },
    labels: ["Dec","Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    markers: {
      size: 0
    },
    yaxis: [
      {
        title: {
          text: 'INFORMED COMPLAINTS',
        },
      },
      {
        opposite: true,
        title: {
          text: 'PENDING TO INFORM',
        },
      },
    ],
    tooltip: {
      shared: true,
      intersect: false,
    }
  };
  
  // Fetch data using AJAX
  fetch('getChartData.php')
    .then(response => response.json())
    .then(data => {
      area2ChartOptions.series = [
        {
          name: 'COMPLAINTS INFORMED',
          data: data.map(entry => entry.informedComplaints),
        },
        {
          name: 'PENDING TO INFORM',
          data: data.map(entry => entry.pendingToInform),
        },
        // ... (other series)
      ];
  
      // Render the area2 chart
      var area2Chart = new ApexCharts(document.querySelector("#area2-chart"), area2ChartOptions);
      area2Chart.render();
    })
    .catch(error => console.error('Error fetching data:', error));
  
  
  //***************//
  // BAR2 CHART
  //***************//
  var bar2Chartoptions = {
    series: [{
      data: [], // Initially, the data is an empty array
    }],
    chart: {
      type: 'bar',
      height: 350,
      toolbar: {
        show: false
      },
    },
    colors: [
      "#246dec",
      "#cc3c43",
      "#367952",
      "#f5b74f",
      "#4f35a1"
    ],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        vertical: false,
        columnWidth: '40%',
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    xaxis: {
      categories: ["TOTAL COMPLAINTS", "COMPLAINTS INFORMED", "REJECTED COMPLAINTS", "PENDING TO INFORM"],
    },
    yaxis: {
      title: {
        text: "YEARLY"
      }
    }
  };
  
  // Fetch data using AJAX
  fetch('getChartData.php')
    .then(response => response.json())
    .then(data => {
      // Convert string values to numbers
      const numericData = {
        totalComplaints: parseInt(data[0].totalRegisteredComplaints),
        informedComplaints: parseInt(data[0].informedComplaints),
        rejectedComplaints: parseInt(data[0].rejectedComplaints),
        pendingToInform: parseInt(data[0].pendingToInform),
      };
  
      bar2Chartoptions.series = [{
        data: [
          numericData.totalComplaints,
          numericData.informedComplaints,
          numericData.rejectedComplaints,
          numericData.pendingToInform,
        ],
      }];
  
      // Render the bar2 chart
      var bar2Chart = new ApexCharts(document.querySelector("#bar2-chart"), bar2Chartoptions);
      bar2Chart.render();
    })
    .catch(error => console.error('Error fetching data for bar2Chart:', error));