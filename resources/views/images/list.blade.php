@extends('layouts.joli')
@section('title', 'Image List')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Images</li>
        <li class="active">List</li>
    </ul>
@endsection
@section('pageTitle', 'Image List')
@section('content')
    <div class="row mb-5">
        @if(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Images</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Thumb</th>
                            <th>Main / Lock</th>
                            <th>Placeholder / Home</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $i => $v)
                            <tr>
                                <th scope="row">{{$images->firstItem() + $i}}</th>
                                <td>{{$v->category_name}}</td>
                                <td>{{$v->sub_category_name}}</td>
                                <td>
                                    <img src="{{asset($v->image_thumb)}}" width="50">
                                </td>
                                <td>
                                    <img src="{{asset($v->image_1)}}" width="100">
                                </td>
                                <td>
                                    <img src="{{asset($v->image_2)}}" width="100">
                                </td>
                                <td>
                                    <form action="{{route('image.delete', ['iid' => $v->id])}}" method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                onclick="return confirm('Are you sure you want to delete the Image?')">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{$images->links()}}
                    <span>Showing {{$images->firstItem()}} - {{$images->lastItem()}} of {{$images->total()}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection

