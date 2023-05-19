        </div>
    </div>
    <div class="loading"></div>
</div>
    <script src="/finalhci/Assets/Bootstraps/script.js"></script>
    <script src="/finalhci/Assets/Middleware/jquery.js"></script>
    <script src="/finalhci/Assets/Middleware/plugins/toastr/toastr.min.js"></script>
    <script src="/finalhci/Assets/Middleware/plugins/chart.js/Chart.min.js"></script>
    <script src="/finalhci/Assets/Middleware/plugins/jquery.flot.js"></script>
    <script src="/finalhci/Assets/OtherFunctions/adminlte.js"></script>
    <script src="/finalhci/Assets/OtherFunctions/functions.js"></script>
    <script src="/finalhci/Assets/Middleware/showProduct.js"></script>
    <script src="/finalhci/Assets/Middleware/logout.js"></script>
    <script src="/finalhci/Assets/Middleware/vueJs/axios.js"></script>
    <script src="/finalhci/Assets/Middleware/vueJs/vue.3.js"></script>
    <script src="/finalhci/Assets/Middleware/vueJs/AdminSide/admin.js"></script>
    <!-- Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var donutData = {
            labels: [
                'George Alfeser',
                'Divine Yabo',
                'Jonathan',
            ],
            datasets: [
                {
                data: [700,500,400],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
                }
            ]
            }
            var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
            }

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieData        = donutData;
        var pieOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        var bar_data = {
            data : [[1,10], [2,8], [3,4], [4,13]],
            bars: { show: true }
        }
            $.plot('#bar-chart', [bar_data], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.6, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April']]
                }
            })
    </script>
</body>
</html>