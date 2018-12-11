@extends('layouts.backend.app')
@section('title', 'Add Category')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush

@section('content')
        <div class="container-fluid">

            <!-- Vertical Layout | With Floating Label -->
            <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add New Post
                                </h2>
                            </div>
                            <div class="body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="title">
                                        <label class="form-label">Post Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label for="image">Fitured Image</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="publish" name="status" class="filled-in" value="1">
                                    <label for="publish">Publish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Categories and Tags
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Select Category</label>
                                            <select name="categories[]" id="category" class="form-group show-tick" data-live-search="true" multiple>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Select Tag</label>
                                            <select name="tags[]" id="tag" class="form-group show-tick" data-live-search="true" multiple>

                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Post Description
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <textarea name="body" id="tinymce"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Vertical Layout | With Floating Label -->

        </div>
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<!-- TinyMCE -->
<script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>

<script>
$(function () {
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
});
</script>
@endpush