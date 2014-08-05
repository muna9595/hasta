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
			        {{ Form::label('password', 'New password') }}
			        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
			    	@if($errors->has('password'))
			        	<div class='bg-danger alert'>{{$errors->first('password')}}</div>
			        @endif
			    </div>

			    <div class='form-group'>
			        {{ Form::label('password', 'Confirm new password') }}
			        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'class' => 'form-control']) }}
			    	@if($errors->has('password_confirmation'))
			        	<div class='bg-danger alert'>{{$errors->first('password_confirmation')}}</div>
			        @endif
			    </div>			 
			    <div class='form-group'>
			        {{ Form::submit('Change', ['class' => 'btn btn-primary']) }}
			    </div>			 
			    {{ Form::close() }}			 
			</div>
	</div>
 
@stop
