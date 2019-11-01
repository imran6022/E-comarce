@extends('layouts.app')

@section('title')
	{{ 'Dashboard' }}
@endsection

@section('content')
<div class="main margin-top-20">
	<div class="row">
		<div class="col-md-3">
			<div class="card card-body">
				<div class="list-group">
				  <a href="" class="list-group-item">
				  	<img src="" alt="photo">
				  </a>
				  <a href="{{ route('user.dashboard') }}" 
				     class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}">Deshboard
				 </a>
				  <a href="{{ route('user.profile') }}" 
				  class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }}">Update Profile
				</a>
				  <a class="list-group-item" href="{{ route('logout') }}" 
				     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                   </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card card-body">
				@yield('sub-content')
			</div>
		</div>
	</div>
</div>
@endsection