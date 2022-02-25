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
                                    <h4 class="page-title">Coupon</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Coupons</a></li>
                                        <li class="breadcrumb-item active">Codes</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('add_coupon') }}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Add New Coupon</a>
                                    </div>
                                </div>
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div id="alert"></div>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Coupon Code</th>
                                                <th>Discount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($coupons as $key=>$coupon)
                                            <tr id="coupon-{{ $coupon->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $coupon->coupon }}</td>
                                                <td>{{ $coupon->discount }}%</td>
                                                <td>{{ $coupon->status }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"  coupon_id = "{{ $coupon->id }}" class="btn btn-sm btn-danger coupon_delete">Delete</a>
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
            $(".coupon_delete").on('click',function(){
                var id = $(this).attr('coupon_id');
                if(confirm('Are you sure to delete coupon?')){
                    $.ajax({
                        url: '{{ route('delete_coupon') }}',
                        type: 'post',
                        data: {id:id, _token:'{{ csrf_token() }}'},
                        success: function(res){
                            if(res.status === 200){
                                $("#alert").html(showMessage('success', res.message));
                                $("#coupon-"+res.id).remove();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
