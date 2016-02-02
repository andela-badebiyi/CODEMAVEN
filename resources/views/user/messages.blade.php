@extends('layouts.master')
@section('title', 'Dashboard')

	<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
		  @include('partials.dashboard_nav')
		</div>
		<div class="col-md-8">
		  <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">Messages</h2>
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
    div.message-list{
        border-bottom: solid thin #ccc;
    }
    div.message-list > div{
        padding: 0.5em 1em 0.5em 0;
    }

	</style>
