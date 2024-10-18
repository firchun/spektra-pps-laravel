<form action="{{ url('cari-berita') }}" method="GET">
    <div class="form-group d-flex" style="max-width: 600px; margin:50px auto;">
        <input type="text" name="search" placeholder="Cari Berita..." value="{{ old('search', request('search')) }}"
            class="form-control"
            style="
            border-radius: 20px 0 0 20px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        ">
        <button type="submit" class="btn btn-primary"
            style="
            border-radius: 0 20px 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        ">
            <i class="bi bi-search" style="margin-right: 5px;"></i> Cari
        </button>
    </div>
</form>
@push('css')
    <style>
        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Mobile-friendly adjustment */
        @media (max-width: 576px) {
            .form-group.d-flex {
                flex-direction: column;
            }

            .form-control,
            .btn {
                border-radius: 20px;
                margin-bottom: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
@endpush
