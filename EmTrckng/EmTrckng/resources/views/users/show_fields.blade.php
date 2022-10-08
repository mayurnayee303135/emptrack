{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>
 --}}


 <div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body pt-2 p-3">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-4 card-title">
                        User Details
                    </h4>
                </div>
            </div>
            <div class="card-body">        
                <div class="mt-4 row">
                    <div class="col">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <tbody> 
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th> Name:- </th>
                                        <td>{{ $user->name }}</td>
                                        <th> Email:- </th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
