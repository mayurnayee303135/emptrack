{!! Form::open(['route' => ['companyVisits.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('companyVisits.show', $id) }}" class='btn btn-warning btn-sm ml-2'>
        <i class="fa fa-eye"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm ml-2',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
