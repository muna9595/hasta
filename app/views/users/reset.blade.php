@extends('layout')

@section('content') 
<div class="row">&nbsp;</div>
	<div class="row">
		<div class='col-lg-4 col-lg-offset-4'>
			@if(Session::has('message'))
				<p>{{Session::get('message')}}</p>
			@endif	
		</div>
		<div class='col-lg-4 col-lg-offset-4' id="box-area">					    
		    <h4 id="title-box">Forgot password</h4>
		    <br/>
		    <form action="{{URL::to('/reset')}}" method="post">				 
			    <div class='form-group'>
			        {{ Form::label('email', 'Email') }}
			        {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
			    	@if($errors->has('email'))
			        	<div class='bg-danger alert'>{{$errors->first('email')}}</div>
			        @endif
			    </div>				 
			    <div class='form-group'>
			        {{ Form::submit('reset', ['class' => 'btn btn-primary']) }}
			    </div>			 
		    </form>		 
		</div>
	</div>
 
@stop
