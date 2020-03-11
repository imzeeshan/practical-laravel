@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if (session('message'))

        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('message') }}
            </div>
        </div>

        @endif

        <div class="card">
            <div class="card-header">
                <h4>List of all Users in the system. </h4> 
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">@sortablelink('name','Name')</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}">Edit</a> &nbsp; | &nbsp;
                                    <a href="{{route('user.delete',$user->id)}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 


                </div>
            </div>

            <div class="card-footer text-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
