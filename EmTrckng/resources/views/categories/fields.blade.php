<div class="col-sm-12 col-lg-8">
    <div class="row">
        <!-- Name Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('name', 'Name:',['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>5]) !!}
        </div>

        <div class="form-group col-sm-12 col-lg-12">
             {!! Form::label('status', 'status:',['class'=>'switch']) !!} 
             {{--{!! Form::checkbox('status', null, ['checked']) !!} --}}
            <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>
        </div>
    </div>


</div>
