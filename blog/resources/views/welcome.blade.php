@extends('layouts.master')
@section('title')
    Welcome
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up </h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="first_name"> First name</label>
                    <input class="form-control" type="text" name="first_name" value="{{ Request::old('first_name') }}" id = "first_name" >
                </div>
                <div class="form-group">
                    <label for="last_name"> Last name</label>
                    <input class="form-control" type="text" name="last_name" id = "last_name">
                </div>
                 <div class="form-group">
                     <label for="email"> Email</label>
                     <input class="form-control" type="text" name="email" id = "email" value="{{ Request::old('email') }}" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                     <div class="help-block with-errors"></div>
                 </div>

                <div class="form-group">
                    <label for="password"> Password</label>
                    <input class="form-control" type="password" name="password" id = "password"  placeholder="Password" required>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>

                <div class="form-group">
                    <label for="password cofirmation"> Password cofirmation</label>
                    <input class="form-control" type="password" name="password cofirmation" id = "password cofirmation" data-match="#password" data-match-error="Whoops, these don't match" placeholder="Password confirmation" required>
                    <div class="help-block with-errors"></div>
                </div>

                <button type="submit" class="btn btn-primary"> Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sign in </h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email"> Email</label>
                    <input class="form-control" type="text" name="email" id = "email"  placeholder="Email" data-error="Bruh, that email address is invalid" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input class="form-control" type="password" name="password" id = "password"  placeholder="Password" required>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>
                <button type="submit" class="btn btn-primary"> Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
