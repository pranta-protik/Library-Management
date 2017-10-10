@extends('templates.master')

@section('title')
    Register
    @endsection

@section('body')
<div class="container myContainer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default myPanel">
                <div class="panel-heading myHeading" ><img src="img/register.png" alt="Register" class="avatar" style="height: 30px;width: 30px">
                <strong>Register</strong>
                </div>
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        {{--Role--}}
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="hidden" name="role" id="role" class="form-control" value="@if(auth()->guest()){{ 'Member' }}@else{{ 'Librarian' }}@endif">
                            </div>
                        </div>

                        {{--Name--}}
                        <div class="form-group @if ($errors->has('firstName')||$errors->has('lastName'))
                                {{ ' has-error'}}
                                @else
                                {{ '' }}
                                @endif ">
                            <label class="col-md-4 control-label">Name :</label>

                            {{--FirstName--}}
                            <div class="col-md-3">
                                <input id="firstName" type="text" class="form-control" name="firstName" placeholder="First" value="{{ old('firstName') }}" required autofocus>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--LastName--}}
                            <div class="col-md-3">
                                <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Last" value="{{ old('lastName') }}" required >

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        {{--Username--}}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username :</label>
                            
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Email--}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Password--}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Confirm Password--}}
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password :</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{--Date of birth--}}
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of birth :</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Gender--}}
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender :</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" selected="selected" disabled>Select Gender</option>
                                    <option value="Male" @if (old('gender')=='Male') selected="selected" @endif>Male</option>
                                    <option value="Female" @if (old('gender')=="Female") selected="selected" @endif>Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Profession--}}
                        <div id="divProfession" class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                            <label for="profession" class="col-md-4 control-label">Profession :</label>

                            <div class="col-md-6">
                                <input id="profession" type="text" class="form-control" name="profession" value="{{ old('profession') }}" required>

                                @if ($errors->has('profession'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Institution--}}
                        <div id="divInstitution" class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                            <label for="institution" class="col-md-4 control-label">Institution :</label>

                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution') }}" required>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Contact--}}
                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">Contact :</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact') }}" required>

                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--Address--}}
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address :</label>

                            <div class="col-md-6">
                                <textarea name="address" id="address" cols="30" rows="7" class="form-control" required></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('sure to register !!')">
                                    Register
                                </button>
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
        $(document).ready(function () {
            var val=$('#role').val();
            if(val=="Member"){
                $('#divProfession').show();
                $('#divInstitution').show();
                $('#profession').prop('required',true);
                $('#institution').prop('required',true);
            }else{
                $('#divProfession').hide();
                $('#divInstitution').hide();
                $('#profession').prop('required',false);
                $('#institution').prop('required',false);
            }
        });
    </script>
@endsection