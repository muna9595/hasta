@extends('layout')

@section('content') 
<div class="row">&nbsp;</div>
	<div class="row">
			<div class='col-lg-4 col-lg-offset-4' id="box-area">
				@if(Session::has('message'))
					<p>{{Session::get('message')}}</p>
				@endif			    
			    <h4 class='fa fa-lock'>Forgot password</h4>
			    <form action="{{URL::to('/login')}}" method="post">				 
				    <div class='form-group'>
				        {{ Form::label('email', 'Email') }}
				        {{ Form::password('password', ['placeholder' => 'Email address', 'class' => 'form-control']) }}
				        @if($errors->has('password'))
				        	<div class='bg-danger alert'>{{$errors->first('password')}}</div>
				        @endif
				    </div>				 
				    <div class='form-group'>
				        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
				    </div>			 
			    </form>		 
			</div>
	</div>
 
@stop
