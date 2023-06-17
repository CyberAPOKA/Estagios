@extends('layouts.app', ['title' => __('User Formation')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' ' . auth()->user()->name,
        'description' => __(
            'This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7',
    ])

    <div class="container-fluid mt--7">

        <div id="app">
            <formation-component :user="{{ $user }}" :formation="{{ $formation }}" :courses="{{ $courses }}"
                :educations="{{ $educations }}">
            </formation-component>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
