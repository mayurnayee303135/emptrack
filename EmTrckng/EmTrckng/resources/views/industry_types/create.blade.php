@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/industryTypes.header.create')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'industry_types.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('industry_types.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('models/industryTypes.button.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('industry_types.index') }}" class="btn btn-default">@lang('models/industryTypes.button.cancel')</a>
            </div>

            {!! Form::close() !!}
            

        </div>
    </div>
@endsection
