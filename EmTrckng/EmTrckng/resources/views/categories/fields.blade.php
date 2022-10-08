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
        
        {{-- @if(isset($category) && $category->status == 1) --}}
                <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('status', 'status:',['class'=>'switch']) !!} 
                        <label class="switch">
                            <input type="checkbox" name="status" value="{{ isset($category) && $category->status }}" {{ isset($category) && $category->status == 1 ? "checked" : ""; }}  {{ !isset($category) ? "" : "" }}>
                            <span class="slider round"></span>
                        </label>
                        {{-- {!! Form::checkbox('status', 1, ['class' => 'form-control','checked']) !!} --}}
                </div>
        {{-- @else
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('status', 'status:',['class'=>'switch']) !!} 
            {{-- {!! Form::checkbox('status', 1, ['class' => 'form-control']) !!} --}}
            {{-- <label class="switch">
                <input type="checkbox" value="0" checked @if($category->statu)>
                <span class="slider round"></span>
            </label>
         </div>
        @endif --}} 

        
       
    </div>


</div>
