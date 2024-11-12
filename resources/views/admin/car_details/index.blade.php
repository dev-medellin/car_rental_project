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
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <div>
                        <!-- Add Category Button -->
                        <a href="{{ route('car_details.display') }}" class="btn btn-primary" style="float: right; margin-bottom: 10px; margin-right:10px">
                            Add Car Rental
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
                                    <th>Availability Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['car_name'] }}</td>
                                        <td>{{ $category['category_name'] }}</td>
                                        <td>{{ $category['description'] }}</td>
                                        <td>{{ $category['rental_price_per_day'] }}</td>
                                        <td>{{ date('F d, Y', strtotime($category['created_at'])) }}</td>
                                        @if($category['availability_status'] == 'booked')
                                            <td>{!! "<span class='bg-info badge avatar-text'>BOOKED</span>" !!}</td>
                                        @elseif($category['availability_status'] == 'under_maintenance')
                                            <td>{!! "<span class='bg-red badge avatar-text'>UNDER MAINTENANCE</span>" !!}</td>
                                        @elseif($category['availability_status'] == 'available')
                                            <td>{!! "<span class='bg-green badge avatar-text'>AVAILABLE</span>" !!}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('car_details.edit.display', ['slug' => $category['car_name_slug']]) }}" class="btn btn-info btn-sm" title="Update">Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-slug={{ $category['car_name_slug'] }} data-toggle="tooltip" data-placement="right" title="Delete ">Remove</a>
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
<script type="text/javascript">
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
                let slug = $(this).data('slug'); // Get the ID of the item to delete
                var listEditRoute = "{{ route('car_details.destroy', ':slug') }}";
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
