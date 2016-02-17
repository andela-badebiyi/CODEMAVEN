@extends('layouts.dashboard')

@section('details')
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
    								<input type='hidden' name='name' value='{{$message->sender_name}}'>
                <input type='hidden' name='email' value='{{ $message->email }}'>
                <input type='hidden' name='subject' value='{{ $message->subject }}'>
                <textarea name='message' rows=6> </textarea>
                <button type='submit' class='btn fa fa-paper-plane mybutton' style="margin-top:1em;">
                    Send Reply
                </button>
            </form>
        </div>
    </div>
@endsection