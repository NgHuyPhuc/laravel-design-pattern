@extends('backend/master/master')
@section('title', 'List User')
@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách thành viên</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thành viên</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                @if(session("alert"))
                                    <div id="offdiv" class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>{{session("alert").session('delname')}}
                                        <a onclick="offdiv();"  href="javascript:void(0)" class="pull-right">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </div>
                                @endif
                                <a href="/admin/user/create" class="btn btn-primary">Thêm Thành viên</a>
                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Full</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item['email'] }}</td>
                                                <td>{{ $item['fullname'] }}</td>
                                                <td>{{ $item['address'] }}</td>
                                                <td>{{ $item['phone'] }}</td>
                                                <td>
                                                    @if ($item['level'] == 1)
                                                        admin
                                                    @else
                                                        user
                                                    @endif
                                                </td>
                                                {{-- @if ($item['level'] == 1)
                                                    <td>admin</td>
                                                @else
                                                    <td>user</td>
                                                @endif --}}
                                                <td>
                                                    <a href="/admin/user/edit/{{$item['id']}}" class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a href="/admin/user/delete/{{$item['id']}}" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>1</td>
                                            <td>Admin@gmail.com</td>
                                            <td>Nguyễn thế phúc</td>
                                            <td>Thường tín</td>
                                            <td>0356653300</td>
                                            <td>1</td>
                                            <td>
                                                <a href="#" class="btn btn-warning"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i> Sửa</a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"
                                                        aria-hidden="true"></i> Xóa</a>
                                            </td>
                                        </tr> --}}

                                    </tbody>
                                </table>
                                <div align='right'>
                                    {{-- <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
                                    </ul> --}}
                                    {{ $user->links('pagination::bootstrap-4') }}
                                    {{-- {{ $user->links() }} --}}

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->


            </div>
            <!--end main-->

            <!-- javascript -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
			<script>
                function offdiv(){
                    var x = document.getElementById("offdiv");
                    x.style.display = "none";
                }
            </script>

        @endsection
