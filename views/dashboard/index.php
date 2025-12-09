<!-- làm tại đây -->
<!--kjshdfkjhsdkjfhs-->
<div class="dashboard">
    <div class="summary">
        <div class="card purple">
            <h3>Tổng doanh thu</h3>
            <p>1.245.320.000</p>
            <span class="positive">↑ 12.4%</span>
        </div>
        <div class="card pink">
            <h3>Doanh thu liên kết</h3>
            <p>385.720.000 VNĐ</p>
            <span class="positive">↑ 7.9%</span>
        </div>
        <div class="card blue">
            <h3>Hoàn tiền</h3>
            <p>32.850.000 VNĐ</p>
            <span class="na">≈ 2.6% tổng doanh thu</span>
        </div>
        <div class="card yellow">
            <h3>Tổng số sản phẩm bán ra</h3>
            <p>18.452</p>
        </div>
    </div>

  

    <!-- Biểu đồ tĩnh -->
<div class="card" style="margin-top: 20px;">
    <h3>Biểu đồ doanh thu theo tháng</h3>
    <canvas id="revenueChart" height="100"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');

    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [
                    12480000, 18950000, 29320000, 21780000, 24650000, 27940000,
                    30120000, 28890000, 31250000, 33480000, 35990000, 40230000
                ],
                /* 🎨 MÀU MỚI - PASTEL NEON */
                backgroundColor: [
                    '#a29bfe', '#81ecec', '#55efc4', '#74b9ff',
                    '#ffeaa7', '#fab1a0', '#ff7675', '#fd79a8',
                    '#e17055', '#fdcb6e', '#00cec9', '#6c5ce7'
                ],
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#fff'
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.formattedValue + ' VNĐ';
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#fff'
                    }
                },
                y: {
                    ticks: {
                        color: '#fff'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>