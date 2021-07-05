<x-base-layout>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset($dog->avatar)}}" class="rounded-circle" height="120px" class="card-img-top" alt="{{$dog->name}} Image">
            </div>
            <div class="col-md-8">
                <div class="card-body" style="margin-right: 25px">
                    <h5 class="card-title"> اسم الكلب : {{$dog->name}}</h5>
                    <h5 class="card-title"> مالك الكلب : {{$dog->user->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">

        <table class="table">
            <tr>
                <td>
                    <h5>التدريبات</h5>
                </td>
            </tr>
            @foreach($dog_activities as $activity)
            <tr>
                <td style="text-align: right ;margin-right: 5px"><h6>{{$activity->training->name}}</h6></td>
                <td>اجمالي الساعات  {{$activity->duration}}</td>
                <td>
                    <?php $time=0; ?>
                    @foreach($activity->sessions as $key => $session)
                        <ol> جلسة رقم  ({{++$key}}) مدتها {{$session->duration}} ساعه </ol>
                        <?php $time += $session->duration ; ?>
                     @endforeach
                </td>
                <td>ما تم تدريبه {{$time}}</td>
                <td>المتبقي {{$activity->duration - $time}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="card mb-3">
        <table class="table">
            <tr><h6>التطعيمات</h6></tr>
            @foreach($dog_vaccines as $vaccine)
            <tr>
                <td><h6>{{$vaccine->vaccines->name}}</h6></td>
                <td>@if($vaccine->status == 0) مطلوب @elseif($vaccine->status == 1) مأخوذ @endif </td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </div>


{{--    <div class="card mb-3">--}}

{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">اسم الكلب : {{$dog->name}}</h5>--}}
{{--            <h6 class="card-title">التدريبات</h6>--}}
{{--            @forelse($dog_activities as $activity)--}}
{{--            <ul> {{$activity->training->name}}    -- وقت التدريب ({{$activity->duration}}) ساعه </ul>--}}
{{--                @foreach($activity->sessions as $key => $session)--}}
{{--                    <ol> جلسة رقم : {{++$key}} مدتها {{$session->duration}} ساعه </ol>--}}
{{--                @endforeach--}}
{{--            @empty--}}
{{--                لا يوجد امصال--}}
{{--            @endforelse--}}
{{--            <h6 class="card-title">ملاحظات</h6>--}}
{{--            <p class="card-text">{{$dog->notes}}</p>--}}
{{--            <p class="card-text"> <span>مالك الكلب :</span> <small class="text-muted">{{$dog->user->name}}</small></p>--}}
{{--        </div>--}}
{{--    </div>--}}

</x-base-layout>
