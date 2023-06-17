@extends('admin.departament.layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('/css/treeview.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

    @include('admin.layouts.headers.cards')

    <div class="container-fluid mt--7">


        <div id="app">
            {{-- <departament-component></departament-component> --}}

            <div class="card card-fullscreen shadow">
                <div class="card-header text-center">
                    <h4 class="card-title"> <strong>Criar Departamentos</strong>
                    </h4>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">

                        <div class="container">
                            <div class="panel panel-primary">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3>Árvores</h3>

                                            <ul id="tree1">
                                                @foreach ($categories as $category)
                                                    <li class="row">

                                                        {{ '🌲 ' . $category->title }}


                                                        {{-- <div id='content'>
                                                            <form
                                                                action="{{ route('admin.departament.update', $category->id) }}"
                                                                method="POST">
                                                                <input class="form-control input1" aria-label="Small"
                                                                    id='title' name='title'>
                                                                @csrf
                                                            </form>
                                                        </div> --}}

                                                        {{-- <form
                                                            action="{{ route('admin.departament.delete', $category->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit">
                                                                <i class="bi bi-trash3-fill" style="padding-left: 10px"></i>
                                                            </button>
                                                        </form> --}}


                                                        @if (count($category->childs))
                                                            @include('admin.pages.childs', [
                                                                'childs' => $category->childs,
                                                            ])
                                                        @endif

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Adicionar Árvores e folhas</h3>


                                            {!! Form::open(['route' => 'admin.add.tree']) !!}


                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif


                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                {!! Form::label('Árvore:') !!}
                                                {!! Form::text('title', old('title'), [
                                                    'class' => 'form-control',
                                                    'name' => 'title',
                                                    'placeholder' => 'Enter Title',
                                                ]) !!}
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>


                                            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                                {!! Form::label('Folhas:') !!}
                                                {!! Form::select('parent_id', $allCategories, old('parent_id'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Selecione uma Árvore Mãe',
                                                ]) !!}
                                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-success">Adicionar</button>
                                            </div>


                                            {!! Form::close() !!}


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/treeview.js') }}"></script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
