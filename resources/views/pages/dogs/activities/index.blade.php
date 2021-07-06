<x-base-layout>
    @section('page-title', 'تدريبات الكلب')
    @section('top_bar')
        <div data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="تسجيل تدريب جديد">
            <a href="{{route('dogs.activities.create', $dog->id)}}" class="btn btn-sm btn-primary fw-bolder">
                تدريب جديد
            </a>
        </div>
    @endsection

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">  تدريبات الكلب<strong style="margin-right: 7px;"> <a href="{{route('dogs.show',$dog->id)}}"> {{$dog->name}} </a></strong></h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <th>اسم التدريب</th>
                    <th>المدة</th>
                    <th>خيارات</th>
                </thead>
                <tbody>
                    @foreach($dog->activities as $activity)
                    <tr>
                        <td>{{$activity->name}}</td>
                        <td>{{$activity->total_duration}}</td>
                        <td>
                            <form action="{{route('dogs.activities.destroy', [$dog->id, 0])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-icon btn-sm btn-danger btn-active-light-primary">
                                    <i class="fa fa-trash"></i>
                                </button>

                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
