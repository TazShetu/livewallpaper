@extends('layouts.joli')
@section('title', 'Sub Category')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Sub Category</li>
    </ul>
@endsection
@section('pageTitle', 'Sub Category')
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
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sub Category Create</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('sub.category.store')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Category</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="category_id" required>
                                    <option selected disabled hidden value="">Choose...</option>
                                    @foreach($categories as $e)
                                        <option
                                            value="{{$e->id}}" {{(old('category_id')== $e->id)?'selected':'' }}>{{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="help-block text-danger">{{$errors->first('category_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" required value="{{old('name')}}"
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Sub Category Description" name="description"
                                           value="{{old('description')}}"
                                           class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('description'))
                                    <span class="help-block text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Is Menu</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="is_menu" required id="IsMenu">
                                    <option selected value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @if($errors->has('is_menu'))
                                    <span class="help-block text-danger">{{$errors->first('is_menu')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span>Thumbnail Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input class="imageClass" type="file" name="thumb_image">
                            </div>
                            @if($errors->has('thumb_image'))
                                <span class="help-block text-danger">{{$errors->first('thumb_image')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span>Background Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input class="imageClass" type="file" name="background_image">
                            </div>
                            @if($errors->has('background_image'))
                                <span class="help-block text-danger">{{$errors->first('background_image')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Create</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Sub Categories</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Is Menu</th>
                            <th>Thumb</th>
                            <th>Background</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $i => $c)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$c->category_name}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{(($c->is_menu * 1) == 1) ? 'Yes' : 'No'}}</td>
                                <td>
                                    <img src="{{asset($c->image_thumb)}}" width="50">
                                </td>
                                <td>
                                    <img src="{{asset($c->image_background)}}" width="100">
                                </td>
                                <td>
                                    <a href="{{route('sub.category.edit', ['cid' => $c->id])}}"
                                       class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                    <form action="{{route('sub.category.delete', ['cid' => $c->id])}}" method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                onclick="return confirm('Are you sure you want to delete the Sub Category ?')">
                                            [[ <i class="fa fa-trash-o"></i> ]]
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
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
    <script>
        $(function () {
            $("#IsMenu").on('change', function () {
                let isMenu = $(this).val();
                if (isMenu == 1) {
                    $(".imageClass").prop('required', true);
                } else {
                    $(".imageClass").prop('required', false);
                }
            });
        });
    </script>
@endsection

