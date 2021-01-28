@extends('layouts.joli')
@section('title', 'Banner')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Banner</li>
    </ul>
@endsection
@section('pageTitle', 'Image Upload')
@section('content')
    <div class="row mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @endif
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Banner Image Upload</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('banner.store')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Category</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="category" required id="Category">
                                    <option selected disabled hidden value="">Choose...</option>
                                    @foreach($categories as $e)
                                        <option value="{{$e->id}}" {{(old('category')== $e->id)?'selected':'' }}>
                                            {{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('category')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span>Banner Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="banner" required>
                            </div>
                            @if($errors->has('banner'))
                                <span class="help-block text-danger">{{$errors->first('banner')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Upload</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Banner Images</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bImages as $i => $v)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$v->category_name}}</td>
                                <td>
                                    <img src="{{asset($v->image)}}" width="200">
                                </td>
                                <td>
                                    <form action="{{route('banner.delete', ['bid' => $v->id])}}" method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                onclick="return confirm('Are you sure you want to delete the Banner Image?')">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--        <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->

@endsection
