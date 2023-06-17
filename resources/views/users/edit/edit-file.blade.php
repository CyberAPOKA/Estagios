@extends('layouts.app', ['title' => __('User File')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' ' . auth()->user()->name,
        'description' => __(
            'This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7',
    ])

    <div class="container-fluid mt--7">

        <div id="app">
            <file-component :user="{{ $user }}" :files="{{ $files }}">
            </file-component>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
