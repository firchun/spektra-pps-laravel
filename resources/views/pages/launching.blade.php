@extends('layouts.frontend.blank')
@section('content')
    <section>
        <div class="container section-title" data-aos="fade-up">
            <img src="{{ asset('/') }}img/logo_spektra.png" alt="" style="height: 150px;">
            <p>
                <span>Launching </span> <span class="description-title">SPEKTRA</span>
            </p>
            <p style="font-size:20px;" class="text-danger">Jam : <span id="clock"></span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-8">
                    <div class="card border-primary shadow-lg" style="border-radius: 25px;">
                        <div class="card-body text-center">
                            <h1 id="counter" style="font-size: 100px;" class="fw-bold text-primary">0</h1>
                            <h6>Pengunjung Hari ini</h6>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div class="p-2 mx-4">
                                    Hari ini :
                                    <b class="fw-bold h3 text-danger" id="today">0</b>
                                </div>
                                <div class="p-2 mx-4">
                                    Total :
                                    <b class="fw-bold h3 text-danger" id="total">0</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }


        setInterval(updateClock, 1000);
        updateClock();
    </script>
    <script>
        function updateVisitorData() {
            fetch('/get-visitor')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('counter').textContent = data.today;
                    document.getElementById('today').textContent = data.today;
                    document.getElementById('total').textContent = data.total;
                })
                .catch(error => console.error('Error:', error));
        }


        setInterval(updateVisitorData, 1000);
        updateVisitorData();
    </script>
@endpush
