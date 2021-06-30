<!--begin::Action--->
<td class="text-end">
    <button type="submit"  data-status="{{!$model->session_status}}" data-trainer-id="{{$model->trainer_id}}" data-activity-id="{{$model->dog_activity_id}}" data-change-status="{{route('accounts.trainers.sessions.update', ['trainer'=>$model->trainer_id, 'session'=>0])}}" class="btn btn-icon btn-sm btn-{{$model->session_status == 0 ? "success":"danger"}} btn-active-light-primary">
        <i class="fa fa-{{$model->session_status == 0 ? "check":"times"}}"></i>
    </button>
</td>
<!--end::Action--->
