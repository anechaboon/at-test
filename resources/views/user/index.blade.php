@extends('layouts.master')
@section('title') Users @endsection

@section('css')

@endsection

@section('content')

    <div class="row col-12">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Tel.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->tel}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/pages/user-index.init.js')}}"></script>

@endsection
