@extends('templates.master')

@section('title')
    Profile
    @endsection

@section('body')

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body text-center" style="color: darkgreen">
                        <form action="/profile/{{ auth()->user()->id }}" method="post">

                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <img class="profile-img" src="img/profile.jpg" alt="Profile">

                            {{--Role--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <div class="col-md-6 text-left">
                                    <input type="hidden" name="role" id="role" class="form-control" value="{{ auth()->user()->role }}">
                                </div>
                            </div>

                            <div id="divNamelbl">
                                <h1>{{ auth()->user()->firstName.' '.auth()->user()->lastName }}</h1>
                            </div>
                            <div id="divName" style="margin-bottom: 50px" hidden>
                                <br>
                                <div class="col-md-3 col-md-offset-3">
                                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First" value="{{ auth()->user()->firstName }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last" value="{{ auth()->user()->lastName }}" required>
                                </div>
                            </div>
                            <br>
                            {{--Email--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="email" class="control-label col-md-3 text-right">E-Mail Address :</label>
                                <div class="col-md-6 text-left">
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                            </div>

                            {{--Date of birth--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="dob" class="control-label col-md-3 text-right">Date of Birth :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divDob" hidden>
                                        <input type="date" name="dob" id="dob" class="form-control" value="{{ auth()->user()->dob->format('Y-m-d') }}" required>
                                    </div>
                                    <div id="divDoblbl">
                                        <p>{{ auth()->user()->dob->format('j F Y') }} ({{ auth()->user()->dob->age }} {{(auth()->user()->dob->age)>1 ? ' years' : ' year'}})</p>
                                    </div>
                                </div>
                            </div>

                            {{--Gender--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="gender" class="control-label col-md-3 text-right">Gender :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divGender" hidden>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="" disabled>Select Gender</option>
                                            <option value="Male" @if((auth()->user()->gender)=="Male") selected="selected" @endif>Male</option>
                                            <option value="Female" @if((auth()->user()->gender)=="Female") selected="selected" @endif>Female</option>
                                        </select>
                                    </div>
                                    <div id="divGenderlbl">
                                        <p>{{ auth()->user()->gender }}</p>
                                    </div>
                                </div>
                            </div>

                            @if((auth()->user()->role)=="Member")
                            {{--Profession--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="profession" class="control-label col-md-3 text-right">Profession :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divProfession" hidden>
                                        <input type="text" name="profession" id="profession" class="form-control" value="{{(\App\Member::where('user_id',auth()->user()->id)->first())->profession }}" required>
                                    </div>
                                    <div id="divProfessionlbl">
                                        <p>{{ (\App\Member::where('user_id',auth()->user()->id)->first())->profession }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Institution--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="institution" class="control-label col-md-3 text-right">Institution :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divInstitution" hidden>
                                        <input type="text" name="institution" id="institution" class="form-control" value="{{ (\App\Member::where('user_id',auth()->user()->id)->first())->institution }}" required>
                                    </div>
                                    <div id="divInstitutionlbl">
                                        <p>{{ (\App\Member::where('user_id',auth()->user()->id)->first())->institution }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{--Contact--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="contact" class="control-label col-md-3 text-right">Contact :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divContact" hidden>
                                        <input type="text" name="contact" id="contact" class="form-control" value="{{ auth()->user()->contact }}" required>
                                    </div>
                                    <div id="divContactlbl">
                                        <p>{{ auth()->user()->contact }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--Address--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="address" class="control-label col-md-3 text-right">Address :</label>
                                <div class="col-md-6 text-left">
                                    <div id="divAddress" hidden>
                                        <textarea name="address" id="address" class="form-control" cols="30" rows="7" required>{{ auth()->user()->address }}</textarea>
                                    </div>
                                    <div id="divAddresslbl">
                                        <p>{{ auth()->user()->address }}</p>
                                    </div>
                                </div>
                            </div>

                            {{--CreatedAt--}}
                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="created_at" class="control-label col-md-3 text-right">Member From :</label>
                                <div class="col-md-6 text-left">
                                <p>{{ auth()->user()->created_at->format('j F Y') }}</p>
                                </div>
                            </div>

                            {{--Edit--}}
                            <div class="form-group col-md-12">
                                <hr>
                                <div id="divEdit">
                                    <a class="btn btn-primary" onclick="editFunction();">Change Info</a>
                                </div>
                                <div id="divUpdate" hidden>
                                    <button type="submit" class="btn btn-primary" name="update" id="update" onclick="return confirm('sure to update !!')">Update Info</button>
                                </div>
                            </div>
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

            //Date of Birth
            $('#divDoblbl').hide();
            $('#divDob').show();

            //Gender
            $('#divGenderlbl').hide();
            $('#divGender').show();

            var val=$('#role').val();
            if(val=="Member"){
                //Profession
                $('#divProfessionlbl').hide();
                $('#divProfession').show();

                //Institution
                $('#divInstitutionlbl').hide();
                $('#divInstitution').show();
            }

            //Contact
            $('#divContactlbl').hide();
            $('#divContact').show();

            //Address
            $('#divAddresslbl').hide();
            $('#divAddress').show();

            //Edit
            $('#divEdit').hide();

            //Update
            $('#divUpdate').show();
        }
    </script>
    @endsection