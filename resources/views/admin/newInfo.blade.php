@extends('templates.master')

@section('title')
    New Info
@endsection

@section('body')
    <div class="container myContainer">
        <div class="row">
            <div class="tab">
                <button id="defaultOpen" class="tablinks" onclick="openTab(event, 'Authors')">Add authors</button>
                <button class="tablinks" onclick="openTab(event, 'Languages')">Add language</button>
                <button class="tablinks" onclick="openTab(event, 'Categories')">Add category</button>
                <button class="tablinks" onclick="openTab(event, 'Publications')">Add publication</button>
                <button class="tablinks" onclick="openTab(event, 'Types')">Add type</button>
                <div class="col-md-1 col-md-offset-4">
                <a href="{{ route('newBook') }}" class="btn btn-default tab-btn">Add Books</a>
                </div>
            </div>

            {{--Author Tab--}}
            <div id="Authors" class="tabcontent myPanel col-md-12">
                <div class="col-md-8 col-md-offset-2 tab-panel">
                    <div class="panel myPanel">
                        <div class="panel-heading myHeading"><img src="{{ asset('img/addAuthor.png') }}" alt="Register" class="avatar myImg">
                            <strong>Add authors</strong>
                        </div>
                        <div class="panel-body" >
                            <div class="form-horizontal">
                                <br>
                                {{--Name--}}
                                <div class="form-group">
                                    <label for="authorName" class="col-md-4 control-label">Author :</label>
                                    <div class="col-md-6">
                                        <input id="authorName" type="text" class="form-control" name="authorName" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="button" class="btn btn-primary" name="btnAuthor" onclick="authorJS();">
                                            Add
                                        </button>
                                        <span id="author-success" hidden class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;Successfully created</span>
                                        <span id="author-exists" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Author already exists</span>
                                        <span id="author-danger" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Author is required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Language Tab--}}
            <div id="Languages" class="tabcontent myPanel col-md-12">
                <div class="col-md-8 col-md-offset-2 tab-panel">
                    <div class="panel myPanel">
                        <div class="panel-heading myHeading"><img src="{{ asset('img/addLanguage.png') }}" alt="Register" class="avatar myImg">
                            <strong>Add language</strong>
                        </div>
                        <div class="panel-body" >
                            <div class="form-horizontal">
                                <br>
                                {{--Name--}}
                                <div class="form-group">
                                    <label for="languageName" class="col-md-4 control-label">Language :</label>
                                    <div class="col-md-6">
                                        <input id="languageName" type="text" class="form-control" name="languageName" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="button" class="btn btn-primary" name="btnLanguage" onclick="languageJS();">
                                            Add
                                        </button>
                                        <span id="language-success" hidden class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;Successfully created</span>
                                        <span id="language-exists" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Language already exists</span>
                                        <span id="language-danger" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Language is required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Category Tab--}}
            <div id="Categories" class="tabcontent myPanel col-md-12">
                <div class="col-md-8 col-md-offset-2 tab-panel">
                    <div class="panel myPanel">
                        <div class="panel-heading myHeading"><img src="{{ asset('img/addCategory.png') }}" alt="Register" class="avatar myImg">
                            <strong>Add category</strong>
                        </div>
                        <div class="panel-body" >
                            <div class="form-horizontal">
                                <br>
                                {{--Name--}}
                                <div class="form-group">
                                    <label for="categoryName" class="col-md-4 control-label">Category :</label>
                                    <div class="col-md-6">
                                        <input id="categoryName" type="text" class="form-control" name="categoryName" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="button" class="btn btn-primary" name="btnCategory" onclick="categoryJS();">
                                            Add
                                        </button>
                                        <span id="category-success" hidden class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;Successfully created</span>
                                        <span id="category-exists" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Category already exists</span>
                                        <span id="category-danger" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Category is required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Publication Tab--}}
            <div id="Publications" class="tabcontent myPanel col-md-12">
                <div class="col-md-8 col-md-offset-2 tab-panel">
                    <div class="panel myPanel">
                        <div class="panel-heading myHeading"><img src="{{ asset('img/addPublication.png') }}" alt="Register" class="avatar myImg">
                            <strong>Add publication</strong>
                        </div>
                        <div class="panel-body" >
                            <div class="form-horizontal">
                                <br>
                                {{--Name--}}
                                <div class="form-group">
                                    <label for="publicationName" class="col-md-4 control-label">Publication :</label>
                                    <div class="col-md-6">
                                        <input id="publicationName" type="text" class="form-control" name="publicationName" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="button" class="btn btn-primary" name="btnPublication" onclick="publicationJS();">
                                            Add
                                        </button>
                                        <span id="publication-success" hidden class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;Successfully created</span>
                                        <span id="publication-exists" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Publication already exists</span>
                                        <span id="publication-danger" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Publication is required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Type Tab--}}
            <div id="Types" class="tabcontent myPanel col-md-12">
                <div class="col-md-8 col-md-offset-2 tab-panel">
                    <div class="panel myPanel">
                        <div class="panel-heading myHeading"><img src="{{ asset('img/addType.png') }}" alt="Register" class="avatar myImg">
                            <strong>Add type</strong>
                        </div>
                        <div class="panel-body" >
                            <div class="form-horizontal">
                                <br>
                                {{--Name--}}
                                <div class="form-group">
                                    <label for="typeName" class="col-md-4 control-label">Type :</label>
                                    <div class="col-md-6">
                                        <input id="typeName" type="text" class="form-control" name="typeName" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="button" class="btn btn-primary" name="btnType" onclick="typeJS();">
                                            Add
                                        </button>
                                        <span id="type-success" hidden class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;Successfully created</span>
                                        <span id="type-exists" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Type already exists</span>
                                        <span id="type-danger" hidden class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;Type is required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>

        //Tab Selection
        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        //Select Default Tab on refresh
        document.getElementById("defaultOpen").click();

        //Create Author
        function authorJS() {
            var author=$('#authorName').val();
            var name="Author";
            if (author!=""){
                $.ajax({
                    url:"createInfo",
                    type:"get",
                    data:{val:author,key:name},
                    success:function (data) {
                        if (data=='0'){
                            $('#author-exists').fadeIn().delay(5000).fadeOut();
                        }
                        else if (data=='1'){
                            $('#author-success').fadeIn().delay(5000).fadeOut();
                            $('#authorName').val(null);
                        }
                    },
                    error:function (data) {
                        alert('Error!!');
                    }
                });
            }else{
                $('#author-danger').fadeIn().delay(5000).fadeOut();
            }
        }

        //        Create Language
        function languageJS() {
            var language=$('#languageName').val();
            var name="Language";
            if(language!=""){
                $.ajax({
                    url:"createInfo",
                    type:"get",
                    data:{val:language,key:name},
                    success:function (data) {
                        if (data=='0'){
                            $('#language-exists').fadeIn().delay(5000).fadeOut();
                        }
                        else if(data=='1'){
                            $('#language-success').fadeIn().delay(5000).fadeOut();
                            $('#languageName').val(null);
                        }
                    },
                    error:function (data) {
                        alert('Error!!');
                    }
                });
            }else{
                $('#language-danger').fadeIn().delay(5000).fadeOut();
            }
        }

        //Create Category
        function categoryJS() {
            var category=$('#categoryName').val();
            var name='Category';
            if(category!=""){
                $.ajax({
                    url:"createInfo",
                    type:"get",
                    data:{val:category,key:name},
                    success:function (data) {
                        if (data=='0'){
                            $('#category-exists').fadeIn().delay(5000).fadeOut();
                        }
                        else if (data=='1'){
                            $('#category-success').fadeIn().delay(5000).fadeOut();
                            $('#categoryName').val(null);
                        }
                    },
                    error:function (data) {
                        alert('Error!!');
                    }
                });
            }else{
                $('#category-danger').fadeIn().delay(5000).fadeOut();
            }
        }

        //Create Publication
        function publicationJS() {
            var publication=$('#publicationName').val();
            var name='Publication';
            if(publication!=""){
                $.ajax({
                    url:"createInfo",
                    type:"get",
                    data:{val:publication,key:name},
                    success:function(data){
                        if (data=='0'){
                            $('#publication-exists').fadeIn().delay(5000).fadeOut();
                        }
                        else if (data=='1'){
                            $('#publication-success').fadeIn().delay(5000).fadeOut();
                            $('#publicationName').val(null);
                        }
                    },
                    error:function (data) {
                        alert('Error!!');
                    }
                });
            }else{
                $('#publication-danger').fadeIn().delay(5000).fadeOut();
            }
        }

        //Create Type
        function typeJS() {
            var type=$('#typeName').val();
            var name="Type";
            if(type!=""){
                $.ajax({
                    url:"createInfo",
                    type:"get",
                    data:{val:type,key:name},
                    success:function (data) {
                        if (data=='0'){
                            $('#type-exists').fadeIn().delay(5000).fadeOut();
                        }
                        else if (data=='1'){
                            $('#type-success').fadeIn().delay(5000).fadeOut();
                            $('#typeName').val(null);
                        }
                    },
                    error:function (data) {
                        alert('Error!!');
                    }
                });
            }else{
                $('#type-danger').fadeIn().delay(5000).fadeOut();
            }
        }

    </script>
@endsection