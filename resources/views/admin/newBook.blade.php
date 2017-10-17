@extends('templates.master')

@section('title')
    New Books
    @endsection

@section('body')
    <div class="container myContainer">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel myPanel">
            <div class="panel-heading myHeading"><img src="img/newBook.png" alt="Register" class="avatar myImg">
                <strong>Add new books</strong>
            </div>
            <div class="panel-body" >
                <form class="form-horizontal" method="POST" action="{{ route('newBook') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <br>

                    {{--Book Image--}}
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="card book-card">
                                <img id="preview" src="img/addBook.jpg" alt="Book" class="card-img"></a>
                            </div>
                        </div>
                    </div>
                    <br>

                    {{--Image Name--}}
                    <div class="form-group{{ $errors->has('bookImage') ? ' has-error' : '' }}">
                        <label for="bookImage" class="col-md-4 control-label">Cover Image :</label>

                        <div class="col-md-6">
                            <input id="bookImage" type="file" onchange="previewImage(this)" name="bookImage" value="{{ old('bookImage') }}" required>

                            @if ($errors->has('bookImage'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bookImage') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Name--}}
                    <div class="form-group{{ $errors->has('bookName') ? ' has-error' : '' }}">
                        <label for="bookName" class="col-md-4 control-label">Name :</label>

                        <div class="col-md-6">
                            <input id="bookName" type="text" class="form-control" name="bookName" autofocus="autofocus" value="{{ old('bookName') }}" required>

                            @if ($errors->has('bookName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bookName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Number of Authors--}}
                    <div class="form-group{{ $errors->has('noa') ? ' has-error' : '' }}">
                        <label for="noa" class="col-md-4 control-label">Number of Authors :</label>

                        <div class="col-md-6">
                            <input id="noa" type="number" min="0" class="form-control" onblur="jsFunc(this);" name="noa" value="{{ old('noa') }}" required>

                            @if ($errors->has('noa'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('noa') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Authors--}}
                    <div id="divAuthorDDL"></div>

                    {{--Category--}}
                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-md-4 control-label">Category :</label>

                        <div class="col-md-6">
                            <select name="category" id="category" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category')==$category->id ) selected="selected" @endif>{{ $category->categoryName }}</option>
                                    @endforeach
                            </select>

                            @if ($errors->has('category'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Publication--}}
                    <div class="form-group{{ $errors->has('publication') ? ' has-error' : '' }}">
                        <label for="publication" class="col-md-4 control-label">Publication :</label>

                        <div class="col-md-6">
                            <select name="publication" id="publication" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Publication</option>
                                @foreach($publications as $publication)
                                <option value="{{ $publication->id }}" @if (old('publication')==$publication->id) selected="selected" @endif>{{ $publication->publicationName }}</option>
                                    @endforeach
                            </select>

                            @if ($errors->has('publication'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('publication') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Edition--}}
                    <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                        <label for="edition" class="col-md-4 control-label">Edition :</label>

                        <div class="col-md-6">
                            <input id="edition" type="text" class="form-control" name="edition" value="{{ old('edition') }}" required>

                            @if ($errors->has('edition'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edition') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Date of Publish--}}
                    <div class="form-group{{ $errors->has('dop') ? ' has-error' : '' }}">
                        <label for="dop" class="col-md-4 control-label">Date of Publish :</label>

                        <div class="col-md-6">
                            <input id="dop" type="date" class="form-control" name="dop" value="{{ old('dop') }}" required>

                            @if ($errors->has('dop'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dop') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Type--}}
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">Type :</label>

                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" @if (old('type')==$type->id) selected="selected" @endif>{{ $type->typeName }}</option>
                                    @endforeach
                            </select>

                            @if ($errors->has('type'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Number of Books--}}
                    <div class="form-group{{ $errors->has('nob') ? ' has-error' : '' }}">
                        <label for="nob" class="col-md-4 control-label">Number of Books :</label>

                        <div class="col-md-6">
                            <input id="nob" type="number" min="0" class="form-control" name="nob" value="{{ old('nob') }}" required>

                            @if ($errors->has('nob'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nob') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Book Image--}}
                    {{--<div class="form-group{{ $errors->has('bookImage') ? ' has-error' : '' }}">--}}
                        {{--<label for="bookImage" class="col-md-4 control-label">Book Cover :</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--<input type="file" name="bookImage" id="bookImage" onchange="previewImage(this);" required>--}}
                            {{--@if ($errors->has('bookImage'))--}}
                                {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('bookImage') }}</strong>--}}
                                    {{--</span>--}}
                            {{--@endif--}}
                            {{--<div id="divPreview" style="display: none">--}}
                                {{--<img src="#" class="img-circle" id="preview">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-primary" value="btnBook">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        //Load Author DDL
        function jsFunc(element) {
            $.ajax({
                url: "addAuthorDDL",
                type: "get",
                data: {val:element.value},
                success: function (data) {
                    $('#divAuthorDDL').html(data);
                },
                error: function (data) {
                    alert('Error!!');
                }
            });
        }

        //Preview Cover Image

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endsection