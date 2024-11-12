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
