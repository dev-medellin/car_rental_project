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
            <i class="pe-7s-box1"></i>
        </div>
        <div class="header-title">
            <h1>Car Category List</h1>
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
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['category_name'] }}</td>
                                        <td>{{ $category['category_description'] }}</td>
                                        <td>{{ date('F d, Y', strtotime($category['created_at'])) }}</td>
                                        <td>{{ $category['status'] == 1 ? "active" : "inactive" }}</td>
                                        <td>
                                            <a hre="javascript:void(0);" class="btn btn-info btn-sm edit-btn" data-slug={{ $category['category_name_slug'] }} data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a hre="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-slug={{ $category['category_name_slug'] }} data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    <div class="modal fade" id="modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('car-categories.store') }}" id="categoryForm" class="row" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="">Create Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex">
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" value="" name="category_name">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Description</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="category_description" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Status</label>
                                <div class="col-md-6">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="status" checked="">
                                        <label for="inlineRadio1" class="text-success"> Active </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="status">
                                        <label for="inlineRadio2" class="text-danger"> Inactive </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="modal-md-edit" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <form action="" id="categoryFormEdit" class="row" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="">Update Form</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex">
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" value="" name="category_name" id="category_name">
                                    <input class="form-control" type="hidden" value="" name="category_slug" id="category_slug">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Description</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="category_description" id="category_description" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="example-text-input" class="col-sm-3">Category Status</label>
                                <div class="col-md-6">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="edit_car_status_active" name="car_status" value="1">
                                        <label for="edit_car_status_active" class="text-success"> Active </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="edit_car_status_inactive" name="car_status" value="0">
                                        <label for="edit_car_status_inactive" class="text-danger"> Inactive </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

        $('#categoryForm').on('submit', function(event){
            event.preventDefault(); // Prevent the form from submitting the default way

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Handle success response
                    if(response.success == true){
                        toastr.success(`${response.message}`);
                        $('#modal-md').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 1000); // Delay of 1 second (optional)
                    }else{
                        toastr.error(`${response.message}`);
                    }
                },
                error: function(xhr) {
                    // Handle error response
                    toastr.error(`${response.message}`);
                }
            });
        });

        $('.edit-btn').on('click', function(e) {
            e.preventDefault();
            let slug = $(this).data('slug'); // Get the ID from the button
            var listEditRoute = "{{ route('car-categories.show', ':slug') }}";
            let url = listEditRoute.replace(':slug', slug);
            // AJAX request to get the data
            $.ajax({
                url: url, // Replace with your URL or endpoint
                type: 'GET',
                success: function(response) {
                    if (response.data.status === 1) {
                        // Set Active radio button to checked
                        $('#edit_car_status_active').prop('checked', true);
                    } else if (response.data.status === 0) {
                        // Set Inactive radio button to checked
                        $('#edit_car_status_inactive').prop('checked', true);
                    }
                    $('#category_name').val(response.data.category_name);
                    $('#category_description').val(response.data.category_description);
                    $('#category_slug').val(response.data.category_name_slug);
                    $('#modal-md-edit').modal('show');
                },
                error: function(xhr) {
                    // Handle errors
                    console.error("Error fetching data: ", xhr);
                }
            });
        });

        $('#categoryFormEdit').on('submit', function(event){
            event.preventDefault(); // Prevent the form from submitting the default way
            var slug = $('#category_slug').val();
            var listEditRoute = "{{ route('car-categories.update', ':slug') }}";
            let url = listEditRoute.replace(':slug', slug);
            $.ajax({
                url: url,
                method: $(this).attr('method'),
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Handle success response
                    if(response.success == true){
                        toastr.success(`${response.message}`);
                        $('#modal-md-edit').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 1000); // Delay of 1 second (optional)
                    }else{
                        toastr.error(`${response.message}`);
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        // Loop through the error messages and display each one
                        $.each(xhr.responseJSON.errors, function(key, messages) {
                            messages.forEach(message => {
                                toastr.error(message);
                            });
                        });
                    } else {
                        // General error message if there are no validation errors
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });

        $('.delete-btn').on('click', function(e) {
            e.preventDefault(); // Prevent default action (e.g., form submission or link navigation)

            // Show a confirmation alert
            if (confirm('Are you sure you want to delete this item?')) {
                // If confirmed, trigger the delete action
                let slug = $(this).data('slug'); // Get the ID of the item to delete
                var listEditRoute = "{{ route('car-categories.destroy', ':slug') }}";
                let deleteUrl = listEditRoute.replace(':slug', slug);

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
