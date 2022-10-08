{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $industryType->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $industryType->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $industryType->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $industryType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $industryType->updated_at }}</p>
</div> --}}

<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-2 card-title">
                        @lang('models/industryTypes.header.detail')
                    </h4>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody> 
                                <tr>
                                    <th> Name:- </th>
                                    <td>{{ $industryType->name }}</td>
                                    
                                    <th> Description:- </th>
                                    <td>{{ $industryType->description }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

