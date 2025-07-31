<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/main-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    

    <!-- Sidebar Start -->
    @include('layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.topbar')
        <!--  Header End -->
        @include('home')
    </div>
  </div>
    

    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var options_sales_overview = {
                series: [
                    {
                        name: "Total Sale (৳)",
                        data: {!! json_encode($totalSales) !!},
                    },
                    {
                        name: "Due",
                        data: {!! json_encode($totalDue) !!}
                    }
                ],
                chart: {
                    type: "bar",
                    height: 275,
                    toolbar: { show: true },
                    foreColor: "#555",
                    fontFamily: "inherit",
                },
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0,
                        bottom: 0,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "35%",
                        endingShape: "rounded",
                        borderRadius: 5,
                    },
                },
                colors: ["#4caf50", "#dc3545"],
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return "৳" + val;
                    }
                },
                yaxis: {
                    min: 0,
                    tickAmount: 4,
                    labels: {
                        formatter: function (val) {
                            return "৳" + val;
                        }
                    }
                },
                xaxis: {
                    categories: {!! json_encode($dates) !!},
                    axisBorder: {
                        show: false,
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    theme: "dark",
                    y: {
                        formatter: function (val) {
                            return "৳" + val;
                        }
                    }
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
        });
    </script>
</body>
</html>