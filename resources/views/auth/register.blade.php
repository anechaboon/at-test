@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <p>Fill your information to register member</p>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">*Firstname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">*Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Date of Birth --}}
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">Date of Birth</label>

                            <div class="col-md-6">
                                {{-- <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus> --}}
                                <input type="text" class="form-control date-picker" placeholder="Select Birth Date" id="birthdate" name="birthdate" value="" autocomplete="off" required>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Profile Image --}}
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">*Profile Image</label>

                            <div class="col-md-6">
                                {{-- <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus> --}}
                                <input type="file" accept="image/*" onchange="loadFile(event)" id="image" name="image" aria-label="File browser example">
                                
                                {{-- <input type="button" id="image"  name="image" value="Browse" accept="image/*" onchange="loadFile(event)" onclick="document.getElementById('file').click();" />
                                <input type="file" style="display:none;" id="file" name="file"/> --}}
                                
                                <img id="output" width="150" height="150" @if(old('image')) value="{{ old('image') }}" @else value=""@endif>
                                <span class="file-custom"></span>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">*Gender</label>

                            <div class="col-md-6 row">
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <input type="radio" class="pull-right" id="male" name="gender" value="Male" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="male"><p >Male</p></label>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <input type="radio" class="pull-right" id="female" name="gender" value="Female" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="female"><p >Female</p></label>
                                    </div>
                                </div>
                                
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Social --}}
                        <div class="row mb-3">
                            <label for="social_media" class="col-md-4 col-form-label text-md-end">Social</label>

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-4">
                                        <input type="checkbox" id="social_media1" name="social_media[]" value="Facebook">
                                        <label for="social_media1">Facebook</label><br>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" id="social_media2" name="social_media[]" value="Tweeter">
                                        <label for="social_media1">Tweeter</label><br>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" id="social_media3" name="social_media[]" value="Instagram">
                                        <label for="social_media1">Instagram</label><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <input type="checkbox" id="social_media4" name="social_media[]" value="Line">
                                        <label for="social_media1">Line</label><br>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" id="social_media5" name="social_media[]" value="Tiktok">
                                        <label for="social_media1">Tiktok</label><br>
                                    </div>
                                </div>
                                
                                
                                @error('social_media')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">*Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">*Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">*Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
        $(document).ready(function(){

            $('.date-picker').datepicker({ format: 'yyyy-mm-dd'});


        });
    </script>
@endsection


