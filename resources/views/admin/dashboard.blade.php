@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    {{-- <div class="title pb-20">
        <h2 class="h3 mb-0">Dashboard Overview</h2>
    </div> --}}
    <div class="mb-3">
        <div class="jumbotron  text-center"
            style="background: rgba(0, 179, 255, 0.694);backdrop-filter: blur(10px); border-radius:20px;">
            <h2>Selamat Datang di</h2>
            <h4 class="text-white">{{ env('APP_NAME') }}</h4>
        </div>
        <hr>
    </div>
    @if (Auth::user()->role != 'Operator')
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12 mb-4">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <canvas id="companyChart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Pie Chart for Employee Data -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <canvas id="companyPieChart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->role === 'Operator' || Auth::user()->role === 'Super Admin')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <canvas id="visitorLineChart" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('css')
    <style>
        .chart-canvas {
            height: 400px;

        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch your data for the chart (replace with actual values)
        var companyData = {!! json_encode($companyData) !!};

        var ctx = document.getElementById('companyChart').getContext('2d');
        var companyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: companyData.labels,
                datasets: [{
                    label: 'Perusahaan',
                    data: companyData.data, // Data for y-axis (e.g., [100, 200])
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Pie Chart Data
        var pieChartData = {!! json_encode($pieChartData) !!};

        var ctxPie = document.getElementById('companyPieChart').getContext('2d');
        var companyPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: pieChartData.labels,
                datasets: [{
                    data: pieChartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil data pengunjung dalam 7 hari terakhir
            fetch('/visitor-per-day')
                .then(response => response.json())
                .then(data => {
                    var ctx = document.getElementById('visitorLineChart').getContext('2d');
                    var visitorLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Jumlah Pengunjung (7 Hari Terakhir)',
                                data: data.data,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderWidth: 2,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Tanggal'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Pengunjung'
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching visitor data:', error));
        });
    </script>
@endpush
