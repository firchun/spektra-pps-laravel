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

        <!-- Dashboard Stats -->
        <div class="container">
            <div class="row justify-content-center">
                <!-- Card for Kabupaten -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Kabupaten</h5>
                            <p class="card-text">
                                <span id="kabupatenCount"
                                    class="display-4 fw-bold text-primary">{{ $totalKabupaten }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card for SDM -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Tenaga Kerja Lokal</h5>
                            <p class="card-text">
                                <span id="sdmCount" class="display-4 fw-bold text-primary">{{ $totalSdm }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Tenaga Kerja Asing</h5>
                            <p class="card-text">
                                <span id="sdmCount" class="display-4 fw-bold text-primary">{{ $totalSdm }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <canvas id="companyChart" style="width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch your data for the chart (replace with actual values)
        var companyData = {!! json_encode($companyData) !!};

        var ctx = document.getElementById('companyChart').getContext('2d');
        var companyChart = new Chart(ctx, {
            type: 'bar', // You can change the chart type to 'line', 'pie', etc.
            data: {
                labels: companyData.labels, // Labels for x-axis (e.g., ['Company A', 'Company B'])
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
    </script>
@endpush
