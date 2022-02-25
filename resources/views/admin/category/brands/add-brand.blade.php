@extends('admin.layout.admin-layout')
@section('main')
    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Brand Add</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Brands</a></li>
                                        <li class="breadcrumb-item active">Add</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div id="alert"></div>
                                        <form id="brand_form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Brand Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="image" name="image" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" id="status" class="form-control" id="">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                        <a href="{{ route('brands') }}" class="btn btn-danger">Cancel</a>
                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- content -->
                @include('admin.includes.footer')
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection
@section('script')
            <script>
                $(function(){
                    $("#brand_form").submit(function(e){
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: '{{ route('added_brand') }}',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(res){
                                if(res.status === 500){
                                    showError('name',res.message.name);
                                }else if(res.status === 200){
                                    $("#alert").html(showMessage('success', res.message));
                                    $("#brand_form")[0].reset();
                                }
                            }
                        })
                    });
                });
            </script>
@endsection
