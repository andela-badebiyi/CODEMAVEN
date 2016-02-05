@extends('layouts.master')
@section('title', 'Messages')

@section('content')
<div class="row con" style="margin-top:4em;">
	@include('partials.dashboard_nav')
	<div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
		<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
            {{ $message->subject }}
        </h2>
        @include('partials.dashboard_flash')
        <div>
			{!! Form::open(['url'=>'/messages/'.$message->id, 'method' => 'delete']); !!}
				{!! csrf_field(); !!}
				<button type='submit' class='fa fa-times btn btn-danger'> Delete message</button>
			{!! Form::close() !!}
			<p></p>
            <p><strong>From:</strong> <br />{{ $message->sender_name }}</p>
            <p><strong>Sender Email:</strong><br /> {{ $message->email }}</p>
            <p>{!! nl2br($message->message) !!}</p>
            <div class='reply-form'>
                <form action='/messages/reply' method='post'>
                    {!! csrf_field() !!}
                    <input type='hidden' name='email' value='{{ $message->email }}'>
                    <input type='hidden' name='subject' value='{{ $message->subject }}'>
                    <textarea name='message' rows=6> </textarea>
                    <button type='submit' class='btn fa fa-paper-plane mybutton' style="margin-top:1em;">
                        Send Reply
                    </button>
                </form>
            </div>
        </div>

	</div>
</div>

<style>
.huge{
	font-size: 40px;
	margin-top: 0.4em;
}
div.con{
    height: 100%;
}
p{
    margin:0 0 1em 0 !important;
}
.reply-form{
    margin-top: 3em;
}
</style>
@endsection