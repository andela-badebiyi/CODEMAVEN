<h4><strong style="color:#e89980;">{{ $request->requester_name }}</strong></h4>
<span>{{$request->description}}</span><br/>
<small style="font-size:70%;">{{ $request->created_at->diffForHumans() }}</small>
<br/><a href='/request/{{$request->id}}' class='fa fa-check' style="border-bottom:none;"> resolve</a>
<hr />
