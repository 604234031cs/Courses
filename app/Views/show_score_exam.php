<section>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background-color:turquoise;">
                <div class="sb-sidenav-menu">
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Pie Chart Example
                            </div>
                            <div class="card-body">
                                <canvas id="myPieChart" width="100%" height="50"></canvas>
                                <div class="text-center mt-2">
                                    <h4>คะแนนรวมทั้งหมด <?= $total; ?>%</h4>
                                </div>
                            </div>
                            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
        var score = '<?= $total; ?>';
        var quiz_num = 100;

        var total = quiz_num - score;


        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["จำนวนข้อที่ตอบถูก (%)", "จำนวนข้อที่ตอบผิด (%)"],
                datasets: [{
                    data: [score, total],
                    backgroundColor: ['#28a745', "#dc3545"],
                }],
            },
        });
    </script>
</section>