<!--begin::Action--->
<td class="text-end">
    <a href="{{ route('accounts.'.$model::$types[$model->type].'s.edit', $model->id) }}" class="btn btn-icon btn-sm btn-warning btn-active-light-primary">
        <i class="fa fa-edit"></i>
    </a>
    <button data-destroy="{{ route('accounts.users.destroy', $model->id) }}" class="btn btn-icon btn-sm btn-danger btn-active-light-primary">
        <i class="fa fa-trash"></i>
    </button>
</td>
<!--end::Action--->
