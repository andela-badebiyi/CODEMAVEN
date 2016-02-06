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
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    #login{
        background-color: rgba(240, 240, 240, 0.5);
        border-radius: 4px 4px 4px 4px;
        margin-right: auto;
        margin-left: auto;
        margin-top: 1em;
        margin-bottom: 3em;
        padding-bottom: 1em;
    }

    div.row{
        margin-top:5em;
        min-height: 100% !important;
        margin-bottom: 4em;
        padding-bottom: 1em;
    }
    .field{
        padding: 0 1em 0 1em;
        margin-right:auto;
        margin-left:auto;
        margin-bottom: 1em;
    }
    body{
        background-image: url('http://middleeast.etoninstitute.com/wp-content/uploads/2015/06/computer-training.jpg');
    }
</style>
@endsection

@section('js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
@endsection

                    
