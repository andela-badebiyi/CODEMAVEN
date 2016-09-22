@extends('layouts.dashboard')
@section('title', 'Messages')

@section('details')
    <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        <i class='fa fa-envelope'></i> Messages
    </h2>
    @include('partials.dashboard_flash')
    @if(count($messages) == 0)
    <p class='fa fa-frown'>You have no messages</p>
    @else
        @foreach($messages as $message)
            <a href='/messages/{!! $message->id !!}'>
                <div class='col-xs-12 message-list'>
                    <div class='col-xs-3'>
    					@if($message->status == 0)
    						<span style='color:#e89980;'>•</span>
    					@endif
                    <strong>{!! $message->sender_name !!}</strong>
                    </div>
                    <div class='col-xs-7'>
                        {!! $message->subject !!}
                    </div>
                    <div class='col-xs-2'>
                        {!! $message->created_at->diffForHumans() !!}
                    </div>
                </div>
            </a>
        @endforeach
    @endif
@endsection