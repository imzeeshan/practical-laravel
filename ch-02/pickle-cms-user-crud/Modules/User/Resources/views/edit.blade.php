@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Users : Edit</h4> 
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">

                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" value="{{ $user->name }}" name="name" autofocus>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" name="email">                         
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">{{ __('Password') }}</label>
                            <input id="password" type="password"class="form-control" name="password">
                        </div>
                    </div>


                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
