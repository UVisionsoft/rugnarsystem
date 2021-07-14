<x-base-layout>
    <form action="{{route('dogs.store')}}" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <!--begin::Card body-->

                    <div class="card-header">
                        <h3 class="card-title">إضافة كلب جديد</h3>
                    </div>
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
                                       placeholder="صورة الكلب" value="{{old('avatar')}}"/>
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
                                    <option value="" readonly>اختر مالك الكلب</option>
                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}"
                                                @if($owner->id == old("user_id")) selected @endif >{{$owner->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>رقم التسجيل</label>
                                <input type="text" name="registration_num" class="form-control form-control-solid"
                                       placeholder="رقم التسجيل" value="{{old('registration_num')}}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>الفصيلة</label>
                                <select name="faction_id" class="form-control form-control-solid">
                                    <option value="" disabled selected>اختر الفصيلة</option>
                                    @foreach($factions as $faction)
                                    <option value="{{$faction->id}}" @if($faction->id == old("faction_id")) selected   @endif>{{$faction->name}}</option>
                                    @endforeach
                                </select>
                                @error('faction_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                    <label></label>
                                <div class="form-control form-control-solid">
                                    <label>
                                        <input type="radio" name="owned_by" value=1>  مولود بالمزرعة
                                    </label>
                                    &ensp;<label>
                                        <input type="radio" name="owned_by" checked value=2> ملك لعميل
                                    </label>
                                </div>
                                @error('owned_by')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label>النوع</label>
                                <div class="form-control form-control-solid">
                                    <label>
                                        <input type="radio" name="gender" checked value="male"> ذكر
                                    &ensp;</label>
                                    <label>
                                        <input type="radio" name="gender" value="female"> انثي
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label></label>
                                <div class="form-control form-control-solid">
                                    <input type="checkbox" name="status" value=0 > ميت
                                </div>
                            </div>

                            <div class="form-control-solid">
                                <label>ملاحظات</label>
                                <textarea name="notes" class="form-control form-control-solid" cols="30"
                                          rows="5">{{old('notes')}}</textarea>
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
                        @foreach($vaccines as $vaccine_id => $vaccine)
                            <div class="form-group pt-5">
                                <label for="">{{$vaccine}}</label>
                                <select name="vaccines[{{$vaccine_id}}][status]" class="form-check form-control">
                                    <option value="0">اختر حالة التطعيم</option>
                                    <option value="1">مأخوذ</option>
                                    <option value="0">مطلوب</option>
                                </select>
                            </div>
                        @endforeach
                    </div>

                    <!--end::Card body-->
                </div>

            </div>
        </div>
    </form>

    @section('scripts')
        <script>
            $('input[type="checkbox"]').on('change', function ($e){
                if(this.checked) {
                    $(this).parent().parent().find('select').attr('disabled', false);
                }else{
                    $(this).parent().parent().find('select').attr('disabled', true);
                }

            })
        </script>
    @endsection

</x-base-layout>
