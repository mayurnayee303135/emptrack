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

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:',['class' => 'required']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Date Of Birth:',['class' => 'required']) !!}
    {!! Form::text('dob', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:',['class' => 'required']) !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('status', 'status:',['class'=>'switch']) !!} 
    <label class="switch">
        <input type="checkbox" name="status" value="{{ isset($user) && $user->status }}" {{ isset($user) && $user->status == 1 ? "checked" : ""; }}  {{ !isset($user) ? "" : "" }}>
        <span class="slider round"></span>
    </label>
    {{-- {!! Form::checkbox('status', 1, ['class' => 'form-control','checked']) !!} --}}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control','rows'=>5]) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <div class="select2-purple">
        {!! Form::select('role_data[]', $roles,null, ['class' => 'select2 form-control select2-purple','multiple'=>'multiple']) !!}
    </div>
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
