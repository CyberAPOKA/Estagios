@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div id="app">
        <register-component :cities="{{ $cities }}" :districts="{{ $districts }}" :courses="{{ $courses }}"
            :educations="{{ $educations }}">
        </register-component>
    </div>
@endsection
