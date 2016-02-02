@extends('layouts.master')
@section('title', 'Messages')

<div class="row con" style="margin-top:4em;">
	<div class="col-md-3">
		@include('partials.dashboard_nav')
	</div>
	<div class="col-md-8">
		<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
            {{ $message->subject }}
        </h2>
        <div>
						{!! Form::open(['url'=>'/messages/'.$message->id, 'method' => 'delete']); !!}
							{!! csrf_field(); !!}
							<button type='submit' class='fa fa-times btn btn-danger'> Delete message</button>
						{!! Form::close() !!}
						<p></p>
            <p><strong>From:</strong> <br />{{ $message->sender_name }}</p>
            <p><strong>Sender Email:</strong><br /> {{ $message->email }}</p>
            <p>{!! $message->message !!}</p>
            <div class='reply-form'>
                <form action='/messages/reply' method='post'>
                    {!! csrf_field() !!}
                    <input type='hidden' name='email' value='{{ $message->email }}'>
                    <input type='hidden' name='subject' value='{{ $message->subject }}'>
                    <textarea name='message' rows=6> </textarea>
                    <button type='submit' class='button fa fa-paper-plane' style="background-color:#e89980; margin-top:1em;">
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
