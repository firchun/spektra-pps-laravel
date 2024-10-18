@if (Session::has('success'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@elseif (Session::has('danger'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{ Session::get('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $item)
            <ul>
                <li>{{ $item }}</li>
            </ul>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
