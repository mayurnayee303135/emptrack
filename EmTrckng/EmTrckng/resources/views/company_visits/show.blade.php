@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-danger float-right"
                       href="{{ route('company_visits.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('company_visits.show_fields')
                </div>
            </div>

            <div class="col-sm-6 mb-2">
                
                @php $leads = DB::table('leads')->where('company_visit_id','=',$companyVisit->id)->select('id')->first(); @endphp
                @if(empty($leads->id))
                <a class="btn btn-success float-right"
                   href="{{ route('leads.store',$companyVisit->id) }}">
                    {{ __('Generate Lead') }}
                </a>
                @endif
            </div>

        </div>
    </div>
@endsection
