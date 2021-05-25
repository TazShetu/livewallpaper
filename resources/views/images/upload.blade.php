@extends('layouts.joli')
@section('title', 'Image Upload')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Image Upload</li>
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
                    <h3 class="panel-title">Image Upload</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('image.upload.store')}}" class="form-horizontal" method="post"
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
                            <label class="col-md-3 col-xs-12 control-label">Sub Category</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="sub_category" required id="SubCategory">
                                    <option selected disabled hidden value="" id="SubCategoryC">Choose...</option>
                                    @foreach($subCategories as $e)
                                        <option class="hideFirst sid{{$e->category_id}}"
                                                value="{{$e->id}}" {{(old('sub_category')== $e->id)?'selected':'' }}>
                                            {{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('sub_category'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('sub_category')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span>Thumbnail Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="image_thumb" required>
                            </div>
                            @if($errors->has('image_thumb'))
                                <span class="help-block text-danger">{{$errors->first('image_thumb')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span id="imageMainLabel">Main Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="image_main" required>
                            </div>
                            @if($errors->has('image_main'))
                                <span class="help-block text-danger">{{$errors->first('image_main')}}</span>
                            @endif
                        </div>
                        <div class="form-group hideFirst show2">
                            <label class="col-md-3 col-xs-12 control-label">
                                <span id="imagePlaceholderLabel">Placeholder Image</span>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="image_placeholder">
                            </div>
                            @if($errors->has('image_placeholder'))
                                <span class="help-block text-danger">{{$errors->first('image_placeholder')}}</span>
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
    <script>
        $(function () {
            $(".hideFirst").hide();
            $("#Category").on('change', function () {
                $("#SubCategory option:selected").prop('selected', false);
                // $("#SubCategoryC").prop('selected', true);
                let sid = $(this).val();
                $(".hideFirst").hide();
                $(".sid" + sid).show();
                if(sid == 3) {
                    $(".show2").show();
                    $("#imageMainLabel").text('Lock Screen Image');
                    $("#imagePlaceholderLabel").text('Home Screen Image');
                } else if (sid == 2) {
                    $(".show2").show();
                    $("#imageMainLabel").text('Main Image');
                    $("#imagePlaceholderLabel").text('Placeholder Image');
                } else if (sid == 1) {
                    $("#imageMainLabel").text('Main Image');
                    // $("#imagePlaceholderLabel").text('Placeholder Image');
                }
            });
        });
    </script>
@endsection
