<div class="btn-group">
    <button class="btn btn-sm btn-success" onclick="showCustomer({{ $galeri->id }})">show</button>
    <button class="btn btn-sm btn-primary" onclick="editCustomer({{ $galeri->id }})">Edit</button>
    <button class="btn btn-sm btn-danger " onclick="deleteCustomers({{ $galeri->id }})">Delete</button>
</div>
