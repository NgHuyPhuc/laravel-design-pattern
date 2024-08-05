@extends('backend/master/master')
@section('title', 'Add User')
@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                    <div class="panel-body">
                        <form method="POST" action="/admin/user/insert">
                            @if($errors->any())
                                @foreach($errors->all() as $err)
                                    <div class="alert alert-danger">{{$err}}</div>
                                @endforeach
                            @endif
                            <div class="row justify-content-center" style="margin-bottom:40px">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="{{old('email')}}" name="email" class="form-control">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{$errors->toArray()['email'][0]}}</strong>
                                            </div>
                                           {{-- {{ dd($errors->toArray()['email'][0]);}} --}}
                                        @endif
                                        {{-- <div class="alert alert-danger" role="alert">
                                            <strong>email đã tồn tại!</strong>
                                        </div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="text" name="password" value="{{old('password')}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="fullname" value="{{old('fullname')}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="address" value="{{old('address')}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="phone" value="{{old('phone')}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            @if (old('level') == 1)
                                                <option selected value="1">admin</option>
                                            @elseif(old('level') == 1)
                                                <option selected value="2">user</option>
                                            @else
                                                <option value="1">admin</option>
                                                <option selected value="2">user</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">

                                        <button class="btn btn-success" type="submit">Thêm thành viên</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>


                            </div>
                            @csrf
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>

    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>




@endsection
