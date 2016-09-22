@extends('layouts.master')
@section('title', 'Forgot Password')

@section('content')
<div class="row">
    <div class='col-xs-12'>
        <div id='login'>
            <form method="POST" action="{{ url('/password/email') }}">
                <h2 class='align-center' style='color: #e89980; background-color: #000; border-bottom: solid 2px #e5e5e5;'>Forgot Password</h2>
                {!! csrf_field() !!}
                <div class="field">
                    @if (Session::has('status'))
                      <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class='fa fa-check'></i> {{ Session::get('status') }}
                      </div>
                    @endif
                    @if(count($errors->all()))
                      <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          @foreach($errors->all() as $error)
                            <div><i class='fa fa-times'></i> {{ $error }} </div>
                          @endforeach
                      </div>
                    @endif
                    <label class="col-md-4 control-label">E-Mail Address</label><br/>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder='Enter your email'>
                </div>

                <div class="field">
                    <button type="submit" class="btn mybutton">
                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                    </button>
                </div><br/>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{!! asset('css/auth.css') !!}" />
@endsection

@section('js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
@endsection

                    
