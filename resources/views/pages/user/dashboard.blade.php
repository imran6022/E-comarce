@extends('pages.user.master')


@section('sub-content')
<div class="main margin-top-20">
	<div class="mainPart">
		<div class="widget">
			<h4 class="text-center">Welcome {{ $user->first_name . '' . $user->last_name }}</h4>
			<p class="text-center">You can change ypur profile & every information</p>
		</div>
	</div>
</div>
@endsection