<!--begin::Action--->
<td class="text-end">
    <a href="dogs/{{$model->id}}/edit" class="btn btn-icon btn-sm btn-warning btn-active-light-primary">
        <i class="fa fa-edit"></i>
    </a>
    <button data-destroy="{{ route('dogs.destroy', $model->id) }}" class="btn btn-icon btn-sm btn-danger btn-active-light-primary">
        <i class="fa fa-trash"></i>
    </button>
</td>
<!--end::Action--->
