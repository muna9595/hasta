@extends('layout')

@section('content') 
	<div class="row">
			<div class='col-lg-4 col-lg-offset-4'>
				@if(Session::has('message'))
					<p>{{Session::get('message')}}</p>
				@endif			    
			    <h1><i class='fa fa-lock'></i> Login</h1>
			    <form action="{{URL::to('/login')}}" method="post">			 
			    <div class='form-group'>
			        {{ Form::label('username', 'Username') }}
			        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
			        @if($errors->has('username'))
			        	<div class='bg-danger alert'>{{$errors->first('username')}}</div>
			        @endif
			    </div>
			 
			    <div class='form-group'>
			        {{ Form::label('password', 'Password') }}
			        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
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
