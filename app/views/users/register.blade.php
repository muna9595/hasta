@extends('layout')

@section('content') 
	<div class="row">
			<div class='col-lg-4 col-lg-offset-4'>
		   <!-- @if ($errors->has())
			        @foreach ($errors->all() as $error)
			            <div class='bg-danger alert'>{{ $error }}</div>
			        @endforeach
			    @endif  -->
			    @if(Session::has('message'))
					<p>{{Session::get('message')}}</p>
				@endif	
				
			    {{ Form::open(['role' => 'form']) }}			 
			    <div class='form-group'>
			        {{ Form::label('first_name', 'First Name') }}
			        {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
			    	@if($errors->has('first_name'))
			        	<div class='bg-danger alert'>{{$errors->first('first_name')}}</div>
			        @endif
			    </div>
			    <div class='form-group'>
			        {{ Form::label('last_name', 'Last Name') }}
			        {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
			    	@if($errors->has('last_name'))
			        	<div class='bg-danger alert'>{{$errors->first('last_name')}}</div>
			        @endif
			    </div>
			    <div class='form-group'>
			        {{ Form::label('email', 'Email') }}
			        {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
			    	@if($errors->has('email'))
			        	<div class='bg-danger alert'>{{$errors->first('email')}}</div>
			        @endif
			    </div>
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
			        {{ Form::label('password', 'Confirm password') }}
			        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'class' => 'form-control']) }}
			    	@if($errors->has('password_confirmation'))
			        	<div class='bg-danger alert'>{{$errors->first('password_confirmation')}}</div>
			        @endif
			    </div>
			 
			    <div class='form-group'>
			        {{ Form::submit('register', ['class' => 'btn btn-primary']) }}
			    </div>			 
			    {{ Form::close() }}			 
			</div>
	</div>
 
@stop
