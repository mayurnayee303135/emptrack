@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/categories.header.edit')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('categories.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('models/categories.button.update'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('categories.index') }}" class="btn btn-default">@lang('models/categories.button.cancel')</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
