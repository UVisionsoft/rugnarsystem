<!--begin::Action--->
<td class="text-end">
    <a href="invoices/return_purchases/{{$model->id}}/edit" class="btn btn-icon btn-sm btn-warning btn-active-light-primary">
        <i class="fa fa-edit"></i>
    </a>
    <button type="submit" data-destroy="{{ route('return_purchases.destroy', $model->id) }}" class="btn btn-icon btn-sm btn-danger btn-active-light-primary">
        <i class="fa fa-trash"></i>
    </button>
</td>
<!--end::Action--->
