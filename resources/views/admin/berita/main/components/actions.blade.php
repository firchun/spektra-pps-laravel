<div class="btn-group">
    <a class="btn btn-sm btn-primary" href="{{ route('berita.edit', $customer->id) }}">Edit</a>
    <button class="btn btn-sm btn-danger " onclick="deleteCustomers({{ $customer->id }})">Delete</button>
</div>
