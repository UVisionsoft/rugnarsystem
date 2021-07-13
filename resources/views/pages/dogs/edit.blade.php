<x-base-layout>
    <form action="{{route('dogs.update',[$dog->id])}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col-md-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <!--begin::Card body-->

                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات الكلب</h3>
                    </div>

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
                                       value="{{(!isset($dog)) ? old('avatar') : $dog->avatar}}"/>
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
                            <div class="form-group col-md-6">
                                <label>رقم التسجيل</label>
                                <input type="text" name="registration_num" class="form-control form-control-solid"
                                       placeholder="رقم التسجيل"
                                       value="{{old('registration_num')??$dog->registration_num}}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>الفصيلة</label>
                                <select name="faction_id" class="form-control form-control-solid">
                                    <option disabled selected>اختر الفصيلة</option>
                                    @foreach($factions as $faction)
                                        <option value="{{$faction->id}}"
                                                @if($faction->id == old("faction_id")) selected   @endif
                                                @if($faction->id == $dog->faction_id) selected   @endif
                                        >{{$faction->name}}</option>
                                    @endforeach
                                </select>
                                @error('faction_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label>ملكية الكلب</label>
                                <div class="form-control form-control-solid">
                                    <input type="radio" name="owned_by" value=1
                                        @if($dog->owned_by == 1) checked @endif
                                    >  مولود بالمزرعة
                                    <br>
                                    <input type="radio" name="owned_by" value=2
                                        @if($dog->owned_by == 2) checked @endif
                                    > ملك لعميل
                                </div>
                                @error('owned_by')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label>حالة الكلب</label>
                                <div class="form-control form-control-solid">
                                    <input type="checkbox" name="status" value=0
                                    @if($dog->status == 0) checked @endif
                                    > ميت
                                </div>
                            </div>

                            <div class="form-control-solid">
                                <label>ملاحظات</label>
                                <textarea name="notes" class="form-control form-control-solid" cols="30"
                                          rows="5">{{old('notes')??$dog->notes}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-left">
                        <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                        <button type="reset" class="btn btn-secondary">الغاء</button>
                    </div>
                    <!--end::Form-->

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-4">
                <div class="card card-custom gutter-b example example-compact">
                    <!--begin::Card body-->

                    <div class="card-header">
                        <h3 class="card-title">تطعيمات الكلب</h3>
                    </div>
                    <div class="card-body pt-6">
                        @foreach($vaccines as $vaccine)
                            <div class="form-group pt-5">
                                <label for="">{{$vaccine->name}}</label>
                                <select name="vaccines[{{$vaccine->id}}][status]" class="form-check form-control">
                                    <option {{optional(optional($dog->vaccines->where('id', $vaccine->id)->first())->pivot)->status !== 1 ? "selected":""}} value="0">مطلوب</option>
                                    <option {{optional(optional($dog->vaccines->where('id', $vaccine->id)->first())->pivot)->status === 1 ? "selected":""}} value="1">مأخوذ</option>
                                </select>
                            </div>
                        @endforeach
                    </div>

                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </form>

</x-base-layout>
