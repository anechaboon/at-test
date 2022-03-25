@extends('layouts.master')
@section('title') Users @endsection

@section('css')

@endsection

@section('content')
    <h3>Search Users</h3>
    @csrf
    <div class="row col-12">
        

        <div class="input-group mb-3">
            <div class="input-group-text">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="text" class="form-control" name="search" id="search" placeholder="Type to Search">
        </div>
        

        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th class="no-sort">Name</th>
                    <th >Age <i class="fa-sort fa-solid fa-sort-up fa-sort-down hover"></i></th>
                    <th class="no-sort">Email</th>
                    <th class="no-sort">Gender</th>
                    <th class="no-sort">Social</th>
                    <th class="no-sort">Profile Image</th>
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
    <script>
        var searchUser = "{{route('searchUser')}}";
    </script>
    <script src="{{ URL::asset('assets/js/pages/user-index.init.js')}}"></script>

@endsection
