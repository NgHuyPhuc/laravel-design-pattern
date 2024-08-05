@extends('/backend/master/master')
@section('title', 'Category')

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <form action="/admin/category/insert" method="post">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="">Danh mục cha:</label>
                                    <select class="form-control" name="parent" id="">
                                        <option value="0">----ROOT----</option>
                                        {{!!showCategories($categories, 0, "", 0)!!}}
 
                                        {{--<option>Nam</option>
                                        <option>---|Áo khoác nam</option>
                                        <option>---|---|Áo khoác nam</option>
                                        <option>Nữ</option>
                                        <option>---|Áo khoác nữ</option> --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        placeholder="Tên danh mục mới">

                                    <div id="offdiv" class="alert bg-danger" role="alert">
                                        <svg class="glyph stroked cancel">
                                            <use xlink:href="#stroked-cancel"></use>
                                        </svg>Tên danh mục đã tồn tại!<a onclick="offdiv()" href="javascript:void(0)" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                            </div>
                            @csrf
                        </form>
                            <div class="col-md-7">
                                <div id="offdiv2" class="alert bg-success" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg> Đã thêm danh mục thành công! <a onclick="offdiv2()" href="javascript:void(0)" class="pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {!!ShowInfoCategories($categories, 0, "")!!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->


        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script>
        function offdiv(){
            var x = document.getElementById("offdiv");
            x.style.display = "none";
        }
        function offdiv2(){
            var x = document.getElementById("offdiv2");
            x.style.display = "none";
        }
    </script>
@endsection
