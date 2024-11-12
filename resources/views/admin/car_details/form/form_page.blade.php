@extends('admin.layouts.app')
@push('local')
<link href="{{ asset('assets/plugins/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('title', 'Car-Details-Create')

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
            @include('admin.layouts.breadcrumb')
        </div>
    </div> <!-- /. Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <form method="post"
                                    id="carDetailsForm"
                                    action="{{ $form_status == 'create_form' ? route('car_details.create') : route('car_details.edit')}}"
                                    class="f1 {{ $form_status }}"
                                >
                                @csrf
                                <h3 class="m-t-0">Register To Our App</h3>
                                <p>Fill in the form to get instant access</p>
                                <fieldset>
                                    <h2 class="m-0">Car Details</h2>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Car Name</label>
                                            <input type="text" class="form-control" id="car_name" name="car_name" value="{{ $carDetails['car_name']??null }}" placeholder="Enter car name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Category</label>
                                            <select class="form-control" name="car_category" id="car_category">
                                                <option value="">Select Car Category</option>
                                                @foreach ($categories as $category )
                                                    <option value="{{ $category['id'] }}"
                                                        {{ (isset($carDetails['car_category']) && $carDetails['car_category'] == $category['id'] ? 'selected' : '') }}
                                                    >
                                                        {{ $category['category_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Brand</label>
                                            <input type="text" class="form-control" id="brand" name="brand" value="{{ $carDetails['brand']??null }}" placeholder="Enter car name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Year Model </label>
                                            <input type="text" class="form-control" id="model_year" name="model_year" value="{{ $carDetails['model_year']??null }}" placeholder="Enter car name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Rental Price Per Day </label>
                                            <input type="text" class="form-control" id="rental_price_per_day" name="rental_price_per_day" value="{{ $carDetails['rental_price_per_day']??null }}" placeholder="Enter car name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Transmission Type</label>
                                            <select class="form-control" name="transmission_type" id="transmission_type">
                                                <option value="">Select Car Transmission Type</option>
                                                <option value="automatic" {{ (isset($carDetails['transmission_type']) && $carDetails['transmission_type'] == 'automatic'? 'selected' : '') }}>Automatic</option>
                                                <option value="manual" {{ (isset($carDetails['transmission_type']) && $carDetails['transmission_type'] == 'manual' ? 'selected' : '') }}>Manual</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Fuel Type</label>
                                            <select class="form-control" name="fuel_type" id="fuel_type">
                                                <option value="">Select Fuel Type</option>
                                                <option value="petrol" {{ (isset($carDetails['fuel_type']) && $carDetails['fuel_type'] == 'petrol' ? 'selected' : '') }}>Petrol</option>
                                                <option value="diesel" {{ (isset($carDetails['fuel_type']) && $carDetails['fuel_type'] == 'diesel' ? 'selected' : '') }}>Diesel</option>
                                                <option value="electric" {{ (isset($carDetails['fuel_type']) && $carDetails['fuel_type'] == 'electric' ? 'selected' : '') }}>Electric</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Seating Capacity </label>
                                            <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" value="{{ $carDetails['seating_capacity']??null }}" placeholder="Enter car seating capacity" max="15" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Luggage Capacity </label>
                                            <input type="number" class="form-control" id="luggage_capacity" name="luggage_capacity" value="{{ $carDetails['luggage_capacity']??null }}" placeholder="Enter car seating capacity" max="20" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Color</label>
                                            <input type="text" class="form-control" id="color" name="color" value="{{ $carDetails['color']??null }}" placeholder="Enter car seating capacity" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Availability</label>
                                            <select class="form-control" name="availability_status" id="availability_status">
                                                <option value="">Select Status</option>
                                                <option value="available" {{ (isset($carDetails['availability_status']) && $carDetails['availability_status'] == 'available' ? 'selected' : '') }}>Available</option>
                                                <option value="booked" {{ (isset($carDetails['availability_status']) && $carDetails['availability_status'] == 'booked' ? 'selected' : '') }}>Booked</option>
                                                <option value="under_maintenance" {{ (isset($carDetails['availability_status']) && $carDetails['availability_status'] == 'under_maintenance' ? 'selected' : '') }}>Under Maintenance</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" value="{{ $carDetails['location']??null }}" placeholder="Enter car seating capacity" required>
                                        </div>

                                        <h2 class="m-t-4">Features</h2>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Air Condition Available?</label>
                                            <select class="form-control" name="air_conditioning" id="air_conditioning">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ (isset($carDetails['air_conditioning']) && $carDetails['air_conditioning'] == '1' ? 'selected' : '') }}>Yes</option>
                                                <option value="0" {{ (isset($carDetails['air_conditioning']) && $carDetails['air_conditioning'] == '0' ? 'selected' : '') }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">GPS Included?</label>
                                            <select class="form-control" name="gps_included" id="gps_included">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ (isset($carDetails['gps_included']) && $carDetails['gps_included'] == '1' ? 'selected' : '') }}>Yes</option>
                                                <option value="0" {{ (isset($carDetails['gps_included']) && $carDetails['gps_included'] == '0 ' ? 'selected' : '') }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Audio System Included?</label>
                                            <input type="text" class="form-control" id="audio_system" name="audio_system" value="{{ $carDetails['audio_system']??null }}" placeholder="Specify type or model" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Bluetooth Included?</label>
                                            <select class="form-control" name="bluetooth" id="bluetooth">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ (isset($carDetails['bluetooth']) && $carDetails['bluetooth'] == '1' ? 'selected' : '') }}>Yes</option>
                                                <option value="0" {{ (isset($carDetails['bluetooth']) && $carDetails['bluetooth'] == '0' ? 'selected' : '') }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="car_name">Usb Port Included?</label>
                                            <select class="form-control" name="usb_port" id="usb_port">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ (isset($carDetails['usb_port']) && $carDetails['usb_port'] == '1' ? 'selected' : '') }}>Yes</option>
                                                <option value="0" {{ (isset($carDetails['usb_port']) && $carDetails['usb_port'] == '0' ? 'selected' : '') }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-3">
                                                <label for="images">Images</label>
                                                <input type="file" class="form-control"  id="images" name="images[]" multiple>
                                                <small class="form-text text-muted">You can upload multiple images. Maximum size per image is 2MB.</small>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="category_id">Description</label>
                                            <textarea name="description" id="description" placeholder="About Car"
                                            class="form-control" rows="5" id="f1-about-yourself">{{ $carDetails['description'] ?? '' }}</textarea>
                                            <input type="hidden" name="slug" id="slug" value="{{ $carDetails['car_name_slug']??null }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="f1-buttons">
                                                <button type="submit" class="btn btn-success btn-submit-car" >Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.main content -->
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-wizard/form.scripts.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        "use strict"; // Start of use strict

        toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-right",
                "closeButton": true,
                "toastClass": "animated fadeInDown"
        };

        $('#carDetailsForm').on('submit', function(event){
            event.preventDefault();
            const redirectUrl = "{{ route('car_details.list-display') }}";
            const form_status = "{{ $form_status }}"
            let formData = $(this).serializeArray();
            formData.push({ name: 'form_status', value: form_status });
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data:formData,
                success: function(response) {
                    if(response.success == true){
                        toastr.success(`${response.message}`);
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 1000); // Delay of 1 second (optional)
                    }else{
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, messages) {
                                messages.forEach(message => {
                                    toastr.error(message);
                                });
                            });
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        });
    });
</script>
@endpush
