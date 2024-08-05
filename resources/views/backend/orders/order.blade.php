@extends('backend/master/master')
@section('title', 'Đơn hàng')
@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Đơn hàng</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">

                                <a href="/admin/order/processed" class="btn btn-success">Đơn đã xử lý</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>

                                            <th>Xử lý</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order as $item)
                                        <tbody>
                                            <tr>
                                                <td>{{$item['id']}}</td>
                                                <td><a href="/admin/order/detail/{{$item['id']}}">{{$item['name']}}</a></td>
                                                <td>{{$item['phone']}}</td>
                                                <td>{{$item['address']}}</td>
                                                <td>
                                                    <a href="/admin/order/processed?id={{$item['id']}}" class="btn btn-warning"><i
                                                            class="fa fa-pencil" aria-hidden="true"></i>Xử lý</a>

                                                </td>
                                            </tr>

                                        </tbody>
                                    @endforeach

                                </table>
                            </div>
							<div align='right'>
								{{-- <ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
								</ul> --}}
								{{$order->links("pagination::bootstrap-4")}}
							</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
					
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



@endsection
