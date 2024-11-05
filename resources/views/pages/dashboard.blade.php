@extends('layouts.frontend.spektra')

@section('content')
    <section id="dashboard" class="dashboard section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <img src="{{ asset('/') }}img/logo_spektra.png" alt="" style="height: 200px;">
            <p>
                <span>Spektra </span> <span class="description-title">Dashboard</span>
            </p>
        </div><!-- End Section Title -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_kabupaten }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kabupaten</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_distrik }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Distrik</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_perusahaan }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Perusahaan</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_penduduk }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Penduduk</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_pengangguran }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Pengangguran</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_pengangguran }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Produktif</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_tkl }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Tenaga Kerja Lokal</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_tka }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Tenaga Kerja Asing</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $total_oap }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Tenaga Kerja OAP</p>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Stats Section -->

        <!-- Chart Section -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12 mb-4">
                    <canvas id="companyChart" style="width: 100%; height: 400px;"></canvas>
                </div>

                <!-- Pie Chart for Employee Data -->
                <div class="col-lg-4 col-12 mb-4">
                    <canvas id="companyPieChart" style="width: 100%; height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </section>
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
@endpush
