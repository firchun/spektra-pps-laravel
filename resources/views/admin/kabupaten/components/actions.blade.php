<div class="btn-group">
    <a class="btn btn-sm btn-success" href="{{ route('distrik-admin', $customer->id) }}">Show</a>
    <button class="btn btn-sm btn-primary" onclick="editCustomer({{ $customer->id }})">Edit</button>
    <button class="btn btn-sm btn-danger " onclick="deleteCustomers({{ $customer->id }})">Delete</button>
</div>
