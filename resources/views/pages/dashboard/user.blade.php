<x-base-layout>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">كلابي</h3>
        </div>
        <div class="card-body">
    <table class="table table-sm">
       <tr>
           <th>#</th>
           <th>اسم الكلب</th>
           <th>خيارات</th>
       </tr>
        @foreach($dogs as $key => $dog)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$dog->name}}</td>
            <td><a class="btn btn-success btn-sm">Show</a></td>
        </tr>
        @endforeach
    </table>
        </div>
    </div>

</x-base-layout>
