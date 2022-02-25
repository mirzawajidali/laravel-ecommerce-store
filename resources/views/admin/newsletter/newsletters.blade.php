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
                                    <h4 class="page-title">Newsletter</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Newletters</a></li>
                                        <li class="breadcrumb-item active">List</li>
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
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Subscribed</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($newsletters as $key=>$newsletter)
                                            <tr id="newsletter-{{ $newsletter->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $newsletter->email }}</td>
                                                <td>
                                                    @if ($newsletter->subscribers === 1)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"  newsletter_id = "{{ $newsletter->id }}" class="btn btn-sm btn-danger newsletter_delete">Delete</a>
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
            $(".newsletter_delete").on('click',function(){
                var id = $(this).attr('newsletter_id');
                if(confirm('Are you sure to delete newsletter?')){
                    $.ajax({
                        url: '{{ route('delete_newsletter') }}',
                        type: 'post',
                        data: {id:id, _token:'{{ csrf_token() }}'},
                        success: function(res){
                            if(res.status === 200){
                                $("#alert").html(showMessage('success', res.message));
                                $("#newsletter-"+res.id).remove();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
