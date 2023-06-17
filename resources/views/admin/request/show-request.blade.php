@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.headers.cards')

    <div class="container-fluid mt--7">


        <div id="app">
            <showrequest-component :progress="{{ $progress }}" :admin="{{ $admin }}"
                :request="{{ $request }}" :courses="{{ $courses }}" :allcourses="{{ $allCourses }}"
                :departaments="{{ $departaments }}" :cities="{{ $cities }}" :districts="{{ $districts }}"
                :educations="{{ $educations }}">
            </showrequest-component>

            {{-- <showrequest-component :progress="{{ json_encode($progress) }}" :admin="{{ json_encode($admin) }}"
                :request="{{ json_encode($request) }}" :courses="{{ json_encode($courses) }}"
                :allcourses="{{ json_encode($allCourses) }}" :departaments="{{ json_encode($departaments) }}"
                :cities="{{ json_encode($cities) }}" :districts="{{ json_encode($districts) }}"
                :educations="{{ json_encode($educations) }}" :resumes="{{ json_encode($resumes) }}">
            </showrequest-component> --}}
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
