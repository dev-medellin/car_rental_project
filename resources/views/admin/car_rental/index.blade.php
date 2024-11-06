@extends('admin.layouts.app')
@push('local')
<link href="{{ asset('assets/plugins/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/modals/modal-component.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('title', 'Car-Category')

@section('master')
<!-- main content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-car"></i>
        </div>
        <div class="header-title">
            <h1>Car Rental List</h1>
            {{-- {{ dd(session()->all()) }} --}}
            {{-- <small>Advanced interaction controls in any HTML table. <a href="https://datatables.net/examples/styling/bootstrap.html" target="_blank">https://datatables.net/examples/styling/bootstrap.html</a></small> --}}
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div>
                        <!-- Add Category Button -->
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-md" class="btn btn-primary" style="float: right; margin-bottom: 10px; margin-right:10px">
                            Add Category
                        </a>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Car Name</th>
                                    <th>Car Category</th>
                                    <th>Car Description</th>
                                    <th>Car Price</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['car_name'] }}</td>
                                        <td>{{ $category['category_name'] }}</td>
                                        <td>{{ $category['car_description'] }}</td>
                                        <td>{{ $category['car_price'] }}</td>
                                        <td>{{ date('F d, Y', strtotime($category['created_at'])) }}</td>
                                        <td>{{ $category['status'] == 1 ? "Available" : "Rented" }}</td>
                                        <td>
                                            <a hre="javascript:void(0);" class="btn btn-info btn-sm edit-btn" data-id={{ $category['id'] }} data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a hre="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-id={{ $category['id'] }} data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.main content -->
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/modals/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/modals/modalEffects.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        "use strict"; // Start of use strict

        toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown"
        };

        $('#dataTableExample1').DataTable({
            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
            "iDisplayLength": 10
        });
        $('.delete-btn').on('click', function(e) {
            e.preventDefault(); // Prevent default action (e.g., form submission or link navigation)

            // Show a confirmation alert
            if (confirm('Are you sure you want to delete this item?')) {
                // If confirmed, trigger the delete action
                let itemId = $(this).data('id'); // Get the ID of the item to delete
                var listEditRoute = "{{ route('car-details.destroy', ':id') }}";
                let deleteUrl = listEditRoute.replace(':id', itemId);

                $.ajax({
                    url: deleteUrl, // Your delete URL
                    type: 'POST', // POST or DELETE method, depending on your server setup
                    data: {
                        _method: 'POST', // If you're using Laravel, specify the DELETE method
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function(response) {
                        // Handle success (e.g., show a success message)
                        alert('Item deleted successfully!');

                        // Optionally, reload the page or update the UI
                        location.reload(); // Reload the page
                    },
                    error: function(xhr) {
                        console.error("Error deleting item:", xhr);
                        alert('Failed to delete the item.');
                    }
                });
            } else {
                // If canceled, do nothing
                console.log('Delete action was canceled.');
            }
        });

    });
</script>
@endpush
