$(function () {


  // -----------------------------------------------------------------------
  // sales overview
  // -----------------------------------------------------------------------

  var options_sales_overview = {
    series: [
      {
        name: "Ample Admin",
        data: [1355, 1390, 1300, 1350, 1390, 1180],
      },
      {
        name: "Pixel Admin",
        data: [1280, 1250, 1325, 1215, 1250, 1310],
      },
      {
        name: "Total Sale",
        data: [1200, 1450, 1800, 1000, 1280, 1500],
      },
    ],
    chart: {
      type: "bar",
      height: 275,
      toolbar: {
        show: false,
      },
      foreColor: "#adb0bb",
      fontFamily: "inherit",
      sparkline: {
        enabled: false,
      },
    },
    grid: {
      show: false,
      borderColor: "transparent",
      padding: {
        left: 0,
        right: 0,
        bottom: 0,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "25%",
        endingShape: "rounded",
        borderRadius: 5,
      },
    },
    colors: ["var(--bs-primary)", "var(--bs-secondary)", "var(--bs-success)"],
    dataLabels: {
      enabled: false,
    },
    yaxis: {
      show: true,
      min: 0,
      max: 2000,
      tickAmount: 3,
    },
    stroke: {
      show: true,
      width: 5,
      lineCap: "butt",
      colors: ["transparent"],
    },
    xaxis: {
      type: "category",
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      axisBorder: {
        show: false,
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
    },
    legend: {
      show: false,
    },
  };

  var chart_column_basic = new ApexCharts(
    document.querySelector("#sales-overview"),
    options_sales_overview
  );
  chart_column_basic.render();


})