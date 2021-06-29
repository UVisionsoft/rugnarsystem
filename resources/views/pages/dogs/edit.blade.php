<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">تعديل بيانات الكلب</h3>
        </div>
        <form action="{{route('dogs.update',[$dog->id])}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="label-control">اسم الكلب :</label>
                        <input dir="auto" name="name" type="text" class="form-control form-control-solid"
                               placeholder="اسم الكلب" value="{{ old('name')?? $dog->name }}"/>
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-1">
                        <img src=" {{ asset($dog->avatar) }}" width="50" height="50">
                    </div>
                    <div class="form-group col-md-5">
                        <label>صورة الكلب:</label>
                        <input dir="auto" name="avatar" type="file" class="form-control form-control-solid"
                               value="{{(!isset($dog)) ? old('avatar') : $dog->avatar}}" />
                        @error('avatar')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>عمر الكلب</label>
                        <input type="number" name="age" class="form-control form-control-solid"
                               placeholder="عمر الكلب" value="{{ old('age')?? $dog->age }}"/>
                        @error('age')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>مالك الكلب</label>
                        <select name="user_id" class="form-control form-control-solid">
                            <option value="" readonly>اختر مالك الكلب</option>
                            @foreach($owners as $owner)
                                <option value="{{$owner->id}}"
                                        @if($owner->id == old("user_id")) selected @endif
                                        @if($owner->id == $dog->user_id) selected @endif
                                >{{$owner->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md">
                        <label>رقم التسجيل</label>
                        <input type="text" name="registration_num" class="form-control form-control-solid"
                               placeholder="رقم التسجيل" value="{{old('registration_num')??$dog->registration_num}}"/>
                    </div>
                    <div class="form-control-solid">
                        <label>ملاحظات</label>
                        <textarea name="notes" class="form-control form-control-solid" cols="30" rows="5">{{old('notes')??$dog->notes}}</textarea>
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
