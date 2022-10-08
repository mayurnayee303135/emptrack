{!! Form::open(['route' => ['permissions.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('permissions.show')
    <a href="{{ route('permissions.show', $id) }}" class='btn btn-warning btn-sm ml-2'>
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('permissions.edit')
    <a href="{{ route('permissions.edit', $id) }}" class='btn btn-primary btn-sm ml-2'>
        <i class="fa fa-edit"></i>
    </a>
    @endcan

    @can('permissions.destroy')
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-sm ml-2',
    'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan

</div>
{!! Form::close() !!}
