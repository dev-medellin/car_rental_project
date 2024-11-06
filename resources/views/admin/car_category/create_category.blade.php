@extends('admin.layouts.app')
@push('local')
<link href="{{ asset('assets/plugins/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
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
            <h1>Data Tables</h1>
            <small>Advanced interaction controls in any HTML table. <a href="https://datatables.net/examples/styling/bootstrap.html" target="_blank">https://datatables.net/examples/styling/bootstrap.html</a></small>
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div>
                        <!-- Add Category Button -->
                        <a href="{{ route('admin.car_category.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 10px; margin-right:10px">
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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_category as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
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
<script>
    $(document).ready(function () {

        "use strict"; // Start of use strict

        $('#dataTableExample1').DataTable({
            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
            "iDisplayLength": 6
        });
    });
</script>
@endpush
