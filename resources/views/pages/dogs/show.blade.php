<x-base-layout>

    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-1">
                    <img src="{{asset($dog->avatar)}}" class="rounded-circle" height="120px" class="card-img-top"
                         alt="{{$dog->name}} Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="margin-top: 20px;margin-right: 25px;">
                        <h5 class="card-title"> اسم الكلب : <span class="text-danger">{{$dog->name}}</span></h5>
                        <h5 class="card-title"> مالك الكلب : <span class="text-danger">{{$dog->user->name}}</span></h5>
                        <h5 class="card-title"> عمر الكلب : <span class="text-danger">{{$dog->age}} شهر </span></h5>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="mt-5 mb-5">التدريبات</h5>
            <table class="table table-bordered table-borderless table-row-bordered table-striped">
                @foreach($dog_activities as $activity)
                    <tr>
                        <td style="text-align: right ;margin-right: 5px"><h6>{{$activity->training->name}}</h6></td>
                        <td>اجمالي الساعات {{$activity->duration}}</td>
                        <td>
                            @foreach($activity->sessions as $session)
                                <ol>
                                    جلسة رقم
                                    <strong>( {{ $loop->iteration }} )</strong>
                                    مدتها
                                    <strong>( {{$session->duration}} ساعات ) </strong>
                                    المدرب :
                                    <strong class="text-danger">{{$session->trainer->name}}</strong>
                                </ol>
                            @endforeach
                        </td>
                        <td>ما تم تدريبة {{ $activity->duration - $activity->remaining_hours }} ساعة</td>
                        <td>المتبقي {{$activity->remaining_hours}} ساعة</td>
                    </tr>
                @endforeach
            </table>
            <hr>
            <h5 class="mt-5 mb-5">التطعيمات</h5>
            <table class="table table-bordered table-borderless table-row-bordered table-striped">
                @foreach($dog_vaccines as $vaccine)
                    <tr>
                        <td>
                            <h6>{{$vaccine->vaccines->name}}</h6>
                        </td>
                        <td> {{($vaccine->status == 1) ? "مأخوذ":"مطلوب"}} </td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


</x-base-layout>
