<div class="btn-group">
    <button class="btn btn-sm btn-warning" onclick="penduduk({{ $customer->id }})">Update Penduduk</button>
    <button class="btn btn-sm btn-primary" onclick="editCustomer({{ $customer->id }})">Edit</button>
    <button class="btn btn-sm btn-danger " onclick="deleteCustomers({{ $customer->id }})">Delete</button>
</div>
