<x-base-layout>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">كلابي</h3>
        </div>
        <div class="card-body">
    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
       <thead>
           <th>#</th>
           <th>اسم الكلب</th>
           <th>خيارات</th>
       </thead>
        @foreach($dogs as $key => $dog)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$dog->name}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('dogs.show',$dog->id)}}"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforeach
    </table>
        </div>
    </div>

</x-base-layout>
