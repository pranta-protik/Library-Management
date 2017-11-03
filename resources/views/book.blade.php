@extends('templates.master')

@section('title')
    Book
@endsection

@section('body')
    <div class="container myContainer">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel myPanel">
                    <div class="panel-body text-center">
                        <form action="/book/{{ $book->id }}" method="post" enctype="multipart/form-data" id="frm">
                            @if(auth()->user()&&auth()->user()->role=="Librarian")
                            <input type="hidden" name="_method" id="method_field">
                            @endif
                            {{ csrf_field() }}

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Upload Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" name="image" id="image" onchange="previewImage(this);">
                                            <br>
                                            <div id="divPreview" style="display: none">
                                                <img src="#" id="preview">
                                                <br>
                                                <br>
                                            </div>
                                            <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary" onclick="updateJS();">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelUpload();">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @if(auth()->user()&&auth()->user()->role=="Librarian")
                            <div class="col-md-offset-11">
                                <button type="submit" class="btn btn-danger" name="delete" id="danger" onclick="deleteJS();">&#10006;</button>
                            </div>
                                @endif
                            <div class="containerProfile col-md-offset-3">
                                @if(auth()->user()&&auth()->user()->role=="Librarian")
                                <a data-toggle="modal" data-target="#myModal" href="#"><img class="book-cover" src="{{ asset($book->bookImage) }}" alt="Cover"></a>
                                <div class="middleProfile">
                                    <a data-toggle="modal" data-target="#myModal" href="#" class="footer-ref">Change</a>
                                </div>
                                    @else
                                    <a href="#"><img class="book-cover" src="{{ asset($book->bookImage) }}" alt="Cover"></a>
                                    @endif
                            </div>

                            {{--BookName--}}
                            <div id="divNamelbl">
                                <h1>{{ $book->bookName }}</h1>
                            </div>
                            <div id="divName" style="margin-bottom: 7vh" hidden>
                                <br>
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="text" name="bookName" id="bookName" class="form-control" placeholder="Name" value="{{ $book->bookName }}" required>
                                </div>
                            </div>
                            <br>


                            {{--Serial No--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="serialNo" class="control-label col-md-3 text-right">Serial No :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divSerialNo" hidden>
                                        <input type="text" name="serialNo" id="serialNo" class="form-control" value="{{ $book->serialNo }}" required>
                                    </div>
                                    <div id="divSerialNolbl">
                                        <p>{{ $book->serialNo }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Authors--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="author" class="control-label col-md-3 text-right">Author(s) :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divAuthorlbl" style="margin-top: -1vh">
                                        @foreach($authors as $author)
                                            <p>
                                                {{ $author->authorName }}
                                                @if(auth()->user()&&auth()->user()->role=="Librarian")
                                                <span style="margin-left: 5vh">
                                                    <button class="btn btn-link" style="text-decoration: none;color: darkred" name="delAuthor" id="btnAuthor" type="submit" value="{{ $author->id }}" onclick="delJS();">&#10006;</button>
                                                </span>
                                                    @endif
                                            </p>
                                        @endforeach
                                    </div>
                                    <div id="divAuthor" hidden>
                                        <select name="author" id="author" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Select Author</option>
                                            @foreach($authorList as $aut)
                                                <option value="{{ $aut->id }}">{{ $aut->authorName }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{--Languages--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="language" class="control-label col-md-3 text-right">Language :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divLanguage" hidden>
                                        <select name="language" id="language" class="form-control">
                                            <option value="" disabled="disabled">Select Language</option>
                                            @foreach($languages as $lan)
                                                <option value="{{ $lan->id }}" @if($lan->id==$book->language_id) selected="selected" @endif>
                                                    {{ $lan->languageName }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div id="divLanguagelbl">
                                        <p>{{ $language->languageName }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Category--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="category" class="control-label col-md-3 text-right">Category :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divCategory" hidden>
                                        <select name="category" id="category" class="form-control">
                                            <option value="" disabled="disabled">Select Category</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" @if($cat->id==$book->category_id) selected="selected" @endif>
                                                    {{ $cat->categoryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="divCategorylbl">
                                        <p>{{ $category->categoryName }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Publication--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="publication" class="control-label col-md-3 text-right">Publication :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divPublication" hidden>
                                        <select name="publication" id="publication" class="form-control">
                                            <option value="" disabled="disabled">Select Publication</option>
                                            @foreach($publications as $pub)
                                                <option value="{{ $pub->id }}" @if($pub->id==$book->publication_id) selected="selected" @endif>
                                                    {{ $pub->publicationName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="divPublicationlbl">
                                        <p>{{ $publication->publicationName }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Type--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="type" class="control-label col-md-3 text-right">Type :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divType" hidden>
                                        <select name="type" id="type" class="form-control">
                                            <option value="" disabled="disabled">Select Type</option>
                                            @foreach($types as $typ)
                                                <option value="{{ $typ->id }}" @if($typ->id==$book->type_id) selected="selected" @endif>
                                                    {{ $typ->typeName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="divTypelbl">
                                        <p>{{ $type->typeName}}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Edition--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="edition" class="control-label col-md-3 text-right">Edition :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divEdition" hidden>
                                        <input type="text" name="edition" id="edition" class="form-control" value="{{ $book->edition }}" required>
                                    </div>
                                    <div id="divEditionlbl">
                                        <p>{{ $book->edition }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--PublishedAt--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="published_at" class="control-label col-md-3 text-right">Published At :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divPublish" hidden>
                                        <input type="date" name="published_at" id="published_at" class="form-control" value="{{ $book->published_at->format('Y-m-d') }}" required>
                                    </div>
                                    <div id="divPublishlbl">
                                        <p>{{ $book->published_at->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Copy--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="copy" class="control-label col-md-3 text-right">Number of copies :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divCopy" hidden>
                                        <input type="number" name="copy" id="copy" class="form-control" value="{{ $copy->copy }}" required>
                                    </div>
                                    <div id="divCopylbl">
                                        <p>{{ $copy->copy }} {{ 'Available ('.$available.')' }}</p>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->user()&&auth()->user()->role=="Librarian")
                            {{--Edit--}}
                            <div class="form-group col-md-12">
                                <hr>
                                <div id="divEdit">
                                    <a class="btn btn-primary" onclick="editFunction();">Change Info</a>
                                </div>
                                <div id="divUpdate" hidden>
                                    <button type="submit" class="btn btn-primary" name="update" id="update" onclick="updateJS();">Update Info</button>
                                </div>
                            </div>
                                @else
                                @if($available>1&&\App\Type::find($book->type_id)->typeName=="Open"&&auth()->user()&&auth()->user()->role=="Member"&&$eligible<3)
                            <div class="form-group col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary" name="borrow" id="borrow" onclick="borrowJS();">Borrow</button>
                            </div>
                                    @endif
                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script>
        function editFunction() {
            //Name
            $('#divNamelbl').hide();
            $('#divName').show();

            //Serial
            $('#divSerialNolbl').hide();
            $('#divSerialNo').show();

            //Author
            $('#divAuthor').show();

            //Language
            $('#divLanguagelbl').hide();
            $('#divLanguage').show();

            //Category
            $('#divCategorylbl').hide();
            $('#divCategory').show();

            //Publication
            $('#divPublicationlbl').hide();
            $('#divPublication').show();

            //Type
            $('#divTypelbl').hide();
            $('#divType').show();

            //Edition
            $('#divEditionlbl').hide();
            $('#divEdition').show();

            //Publish
            $('#divPublishlbl').hide();
            $('#divPublish').show();

            //Copy
            $('#divCopylbl').hide();
            $('#divCopy').show();

            //Edit
            $('#divEdit').hide();

            //Update
            $('#divUpdate').show();
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#divPreview').css('display','block');
                    $('#preview')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function cancelUpload() {
            $('#image').val(null);
            $('#divPreview').css('display','none');
        }
        
        function delJS() {
            $('#method_field').val("DELETE");
            alert('author is being deleted');
            $('#frm').submit();
        }

        function updateJS() {
            $('#method_field').val("PUT");
            alert('details is being updated');
            $('#frm').submit();
        }

        function deleteJS() {
            $('#method_field').val("DELETE");
            alert('book has been deleted');
            $('#frm').submit();
        }
        function borrowJS() {
            alert('request has been sent');
            $('#frm').submit();
        }

    </script>
@endsection