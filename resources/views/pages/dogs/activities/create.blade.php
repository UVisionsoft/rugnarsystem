<x-base-layout>
    @section('page-title', ' تدريب جديد ' . $dog->name)
    <form action="{{route('dogs.activities.store', $dog->id)}}" method="POST">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">اضافة تدريب جديد للكلب</h5>
            </div>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="from-group">
                            <label for=""> التدريب </label>
                            <select class="form-control form-control-solid" name="activity_id" id="">
                                <option value> اختر التدريب</option>
                                @foreach($activities as  $id => $activity)
                                    <option value="{{$id}}">{{$activity}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="from-group">
                            <label for=""> المدة </label>
                            <input class="form-control form-control-solid" name="duration" type="number" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-left">
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                <button type="reset" class="btn btn-secondary">الغاء</button>
            </div>
        </div>
    </form>

</x-base-layout>
