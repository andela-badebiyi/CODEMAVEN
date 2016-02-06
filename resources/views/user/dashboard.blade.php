@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
	<div class="row con" style="margin-top:4em;">
		@include('partials.dashboard_nav')
		<div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
			<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">Dashboard</h2>
		    <div class="row">
		    	<div class="col-xs-12 col-sm-12 col-md-12">
		    		<h4>
		    			Hello, {!! $user->name !!}. <small>Here are your stats</small>
		    		</h4>
		    	</div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$user->allCommentsOnVideos()}}</div>
                                    <div>Total Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color:#337ab7;">
                            <div class="panel-footer">
                                <span class="pull-left">Show all comments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel" style="border-color:#5cb85c; color:#fff;">
                        <div class="panel-heading" style="background-color:#5cb85c;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$user->allVideoViews()}}</div>
                                    <div>Video Views!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color:#5cb85c">
                            <div class="panel-footer">
                                <span class="pull-left">Show Videos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            <div class="col-lg-4 col-md-4">
                    <div class="panel" style="border-color:#f0ad4e; color:#fff;">
                        <div class="panel-heading" style="background-color:#f0ad4e">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($user->messages()->where('status', 0)->get())}}</div>
                                    <div>Unread Messages!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/messages" style="color:#f0ad4e">
                            <div class="panel-footer">
                                <span class="pull-left">View Messages</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
								<div class='col-xs-12'>
									<div class="panel panel-default">
									  <div class="panel-heading">Video Requests</div>
									  <div class="panel-body">
											@if(count($requests) == 0)
												<p class='fa fa-frown-o' style='color:red;'>  No open requests available</p>
											@else
												@foreach($requests as $request)
													@include('partials.list_requests')
												@endforeach
											@endif
										</div>
									</div>
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

	</style>
@endsection
