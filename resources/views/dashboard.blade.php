@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Info Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success"><i class="bi bi-person-fill me-2"></i>Unique Buyers</h5>
                            <p class="card-text fs-4 text-muted">{{ $buyerCount }} buyer(s) have shopped.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><i class="bi bi-box-seam me-2"></i>Total Products Bought</h5>
                            <p class="card-text fs-4 text-muted">{{ $totalProductBought }} items purchased.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning"><i class="bi bi-basket-fill me-2"></i>Products in Stock</h5>
                            <p class="card-text fs-4 text-muted">{{ $totalProducts }} total products available.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional Chart Placeholder -->
            <div class="mt-4">
                <h4 class="fw-bold"><i class="bi bi-bar-chart-line me-2"></i>Sales Statistics</h4>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <canvas id="salesChart" height="100"></canvas>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('salesChart').getContext('2d');
                    const salesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: {!! json_encode($chartLabels) !!},
                            datasets: [{
                                label: 'Items Sold',
                                data: {!! json_encode($chartData) !!},
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
