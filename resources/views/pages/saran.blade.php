@extends('layouts.frontend.app')
@section('content')
    <section class="section">
        <div class="container">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>SARAN</h2>
                <p><span>Kotak </span> <span class="description-title">Saran</span></p>
            </div><!-- End Section Title -->

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('saran.store') }}" method="POST">
                        @csrf
                        <div class="card shadow-md p-3" style="border-radius: 20px;">
                            <div class="mb-2">
                                <i style="color: grey;">*berikan saran anda untuk perbaikan kami kedepannya...</i>
                            </div>
                            <div class="my-3">
                                <label class="mb-2">Isi Saran</label>
                                <textarea class="form-control @error('isi_saran') is-invalid @enderror" rows="7" autofocus required
                                    name="isi_saran"></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right"><i class="bi bi-send"></i> Kirim
                                Saran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
