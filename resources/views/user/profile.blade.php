@extends('layouts.master')
@section('title') Profile @endsection

@section('css')
@endsection

@section('content')

    <h3>My Profile</h3>
    <div class="row col-12">
        <div class="col-2">
            @php
                $image = "assets/images/users/{$user->image}";
            @endphp
            <img src="{{ URL::asset($image)}}" alt="Girl in a jacket" width="200" height="270">
        </div>
        <div class="row col-8">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="12%"><p>FirstName : </p> </td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td><p>LastName : </p> </td>
                        <td>{{$user->lastname}}</td>
                    </tr>
                    <tr>
                        <td><p>Username : </p> </td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td><p>Email : </p> </td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td><p>Date of Birth : </p> </td>
                        <td>{{$user->birthdate}}</td>
                    </tr>
                    <tr>
                        <td><p>Gender : </p> </td>
                        <td>{{$user->gender}}</td>
                    </tr>
                    <tr>
                        <td><p>Social : </p> </td>
                        <td>{{$user->social_media}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
    

@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/pages/user-index.init.js')}}"></script>

@endsection
