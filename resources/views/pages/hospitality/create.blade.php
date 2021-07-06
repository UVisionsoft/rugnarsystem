<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">استضافة جديدة</h3>
        </div>
        <form action="{{route('hospitalities.store')}}" method="post">
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="label-control">اسم الكلب : </label>
                        <select name="dog_id" class="form-control form-control-solid">
                            <option value="">اختار الكلب</option>
                            @foreach($dogs as $dog)
                                <option value="{{$dog->id}}" @if($dog->id == old('dog_id')) selected @endif >{{$dog->name}}</option>
                            @endforeach
                        </select>
                        @error('dog_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label-control">من :</label>
                        <input name="from" type="date" class="form-control form-control-solid" value="{{old('from')}}"/>
                        @error('from')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label-control">الي :</label>
                        <input name="to" type="date" class="form-control form-control-solid" value="{{old('to')}}"/>
                        @error('to')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer text-left">
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                <button type="reset" class="btn btn-secondary">الغاء</button>
            </div>
            <!--end::Form-->
        </form>

        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
