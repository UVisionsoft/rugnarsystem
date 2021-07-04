<x-base-layout>

    <div class="card mb-3">
        <img src="{{asset($dog->avatar)}}" height="350px" class="card-img-top" alt="{{$dog->name}} Image">
        <div class="card-body">
            <h5 class="card-title">اسم الكلب : {{$dog->name}}</h5>
            <h6 class="card-title">التدريبات</h6>
            @forelse($dog_activities as $activity)
            <ul> {{$activity->training->name}}    -- وقت التدريب ({{$activity->duration}}) ساعه </ul>
                @foreach($activity->sessions as $key => $session)
                    <ol> جلسة رقم : {{++$key}} مدتها {{$session->duration}} ساعه </ol>
                @endforeach
            @empty
                لا يوجد امصال
            @endforelse
            <h6 class="card-title">ملاحظات</h6>
            <p class="card-text">{{$dog->notes}}</p>
            <p class="card-text"> <span>مالك الكلب :</span> <small class="text-muted">{{$dog->user->name}}</small></p>
        </div>
    </div>

</x-base-layout>
