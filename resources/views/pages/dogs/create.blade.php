<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">إضافة كلب جديد</h3>
        </div>
        <form action="{{route('dogs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="label-control">اسم الكلب :</label>
                        <input dir="auto" name="name" type="text" class="form-control form-control-solid"
                               placeholder="اسم الكلب" value="{{old('name')}}"/>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>صورة الكلب:</label>
                        <input dir="auto" name="avatar" type="file" class="form-control form-control-solid"
                              placeholder="صورة الكلب"  value="{{old('avatar')}}"/>
                        @error('avatar')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>عمر الكلب</label>
                        <input type="number" name="age" class="form-control form-control-solid"
                               placeholder="عمر الكلب" value="{{old('age')}}"/>
                        @error('age')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>مالك الكلب</label>
                        <select name="user_id" class="form-control form-control-solid">
                            <option>اختر مالك الكلب</option>
                            @foreach($owners as $owner)
                            <option value="{{$owner->id}}" @if($owner->id == old("user_id")) selected @endif >{{$owner->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-control-solid">
                        <label>ملاحظات</label>
                        <textarea name="notes" class="form-control" cols="30" rows="5">{{old('notes')}}</textarea>
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
