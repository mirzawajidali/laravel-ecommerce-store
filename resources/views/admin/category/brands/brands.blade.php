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
                                    <h4 class="page-title">Brands</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Brands</a></li>
                                        <li class="breadcrumb-item active">List</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('add_brand') }}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Add New Brand</a>
                                    </div>
                                </div>
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div id="alert"></div>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($brands as $key=>$brand)
                                            <tr id="brand-{{ $brand->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($brand->image) }}" class="img-fluid" style="width: 60px;" alt=""></td>
                                                <td>{{ $brand->name }}</td>
                                                <td class="text-center datatablemine">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input statusUpdate" @php
                                                            if($brand->status == 1){
                                                                echo "checked";
                                                            }
                                                        @endphp status-id = "{{ $brand->status }}" brand-id = {{ $brand->id }} id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"  class="btn btn-sm btn-secondary brand_id">Edit</a>
                                                    <a href="javascript:void(0)"  brand_id = "{{ $brand->id }}" class="btn btn-sm btn-danger brand_delete">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
            //Delete Brand
            $(".brand_delete").on('click',function(){
                var id = $(this).attr('brand_id');
                if(confirm('Are you sure to delete brand?')){
                    $.ajax({
                        url: '{{ route('delete_brand') }}',
                        type: 'post',
                        data: {id:id, _token:'{{ csrf_token() }}'},
                        success: function(res){
                            if(res.status === 200){
                                $("#alert").html(showMessage('success', res.message));
                                $("#brand-"+res.id).remove();
                            }
                        }
                    });
                }
            });
            //Status Active & Inactive
            $('.statusUpdate').on('change',function(){
                var status = $(this).attr('status-id');
                var  id    = $(this).attr('brand-id');
                $.ajax({
                    url: '{{ route('update_brand_status') }}',
                    type: 'post',
                    data: {id:id, status:status, _token:'{{ csrf_token() }}'},
                    success: function(res){

                    }
                })
            });
        });
    </script>
@endsection
