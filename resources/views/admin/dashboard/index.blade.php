@extends('admin.layouts.app')
@push('local')
@endpush

@section('title', 'Dashboard')

@section('master')
<!-- main content -->
<div class="content">
    <div class=content-header>
        <div class=header-icon>
            <i class=pe-7s-tools></i>
        </div>
        <div class=header-title>
            <h1>Adminpage - Responsive Bootstrap Admin Template Dashboard</h1>
            <small>Very detailed &amp; featured admin.</small>
            <ol class=breadcrumb>
                <li><a href=index.html><i class=pe-7s-home></i> Home</a></li>
                <li class=active>Dashboard</li>
            </ol>
        </div>
    </div>
    <div class=row>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="statistic-box statistic-filled-3">
                <h2><span class=count-number>789</span>K <span class=slight><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                <div class=small>Social users </div>
                <i class="ti-world statistic_icon"></i>
                <div class="sparkline3 text-center"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="statistic-box statistic-filled-1">
                <h2><span class=count-number>696</span>K <span class=slight><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                <div class=small>Visitors this Month</div>
                <i class="ti-server statistic_icon"></i>
                <div class="sparkline1 text-center"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="statistic-box statistic-filled-2">
                <h2><span class=count-number>321</span>M <span class=slight><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                <div class=small>Total users</div>
                <i class="ti-user statistic_icon"></i>
                <div class="sparkline2 text-center"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="statistic-box statistic-filled-4">
                <h2><span class=count-number>5489</span>$ <span class=slight><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                <div class=small>Total Sales</div>
                <i class="ti-bag statistic_icon"></i>
                <div class="sparkline4 text-center"></div>
            </div>
        </div>
    </div>
    <div class=row>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <!-- Start carousel -->
                        <div id="carousel-1" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-1" data-slide-to="1"></li>
                                <li data-target="#carousel-1" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ asset('assets/dist/img/carousel-1.jpg') }}" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="text-white">First slide label</h3>
                                        <p class="text-white"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/dist/img/carousel-2.jpg') }}" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="text-white">Second slide label</h3>
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/dist/img/carousel-3.jpg') }}" alt="...">
                                    <div class="carousel-caption">
                                        <div class="carousel-caption">
                                            <h3 class="text-white">Third slide label</h3>
                                            <p class="text-white">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>  <!-- End carousel -->
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title" style="padding:2%">
                            <h4> Basic example</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to
                            any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for
                            other plugins like calendars and date pickers, we've opted to isolate our custom table styles.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-bd">
                    <div class="panel-heading" >
                        <div class="panel-title" style="padding:2%">
                            <h4> Basic example</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to
                            any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for
                            other plugins like calendars and date pickers, we've opted to isolate our custom table styles.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.main content -->
@endsection
@push('scripts')
@endpush
