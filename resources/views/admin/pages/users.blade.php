@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div id="app">
            <users-component :cities="{{ $cities }}" :districts="{{ $districts }}" :courses="{{ $courses }}"
                :educations="{{ $educations }}" :showCheckbox="showCheckbox">
            </users-component>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
