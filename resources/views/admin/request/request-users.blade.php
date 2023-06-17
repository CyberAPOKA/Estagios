@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.headers.cards')

    <div class="container-fluid mt--7">


        <div id="app">
            <request-users-component :progress="{{ $progress }}" :admin="{{ $admin }}"
                :request="{{ $request }}" :courses="{{ $courses }}" :allcourses="{{ $allCourses }}"
                :departaments="{{ $departaments }}" :cities="{{ $cities }}" :districts="{{ $districts }}"
                :educations="{{ $educations }}" :resumes="{{ $resumes }}"></request-users-component>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
