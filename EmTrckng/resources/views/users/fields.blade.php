<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:',['class' => 'required']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <div class="select2-purple">
        {!! Form::select('role_data[]', $roles,null, ['class' => 'select2 form-control select2-purple','multiple'=>'multiple']) !!}
    </div>
</div>
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('status', 'status:',['class'=>'switch']) !!} 
    {{-- {!! Form::checkbox('status', null, ['checked']) !!} --}}
   <label class="switch">
       <input type="checkbox" checked>
       <span class="slider round"></span>
   </label>
</div>
@if(!isset($user))
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:',['class' => 'required']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
@endif
@push('page_scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush
