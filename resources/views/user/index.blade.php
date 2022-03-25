@extends('layouts.master')
@section('title') Users @endsection

@section('css')

@endsection

@section('content')
    <h3>Search Users</h3>
    <div class="row col-12">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Social</th>
                    <th>Profile Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name.' '.$user->lastname}}</td>
                        <td>{{ \App\Helpers\Helper::calAge($user->birthdate) }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{str_replace(","," ",$user->social_media) }}</td>
                        <td><img src="assets/images/users/{{$user->image}}" alt="Girl in a jacket" width="60" height="70"> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/pages/user-index.init.js')}}"></script>

@endsection
