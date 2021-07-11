<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">{{$type}} جديد </h3>
        </div>
        <form action="{{route('accounts.'.request()->segment(2).'.store')}}" method="post">
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="label-control">اسم المستخدم :</label>
                        <input dir="auto" name="name" type="text" class="form-control form-control-solid"
                               placeholder="اسم المستخدم" value="{{old('name')}}"/>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>البريد الالكتروني:</label>
                        <input dir="auto" name="email" type="email" class="form-control form-control-solid"
                               placeholder="البريد الالكتروني" value="{{old('email')}}"/>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>كلمة المرور</label>
                        <input type="text" name="password" class="form-control form-control-solid"
                               placeholder="كلمة المرور" value="{{old('password')}}"/>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>رقم الهاتف</label>
                        <input type="phone" name="phone" class="form-control form-control-solid"
                               placeholder="رقم الهاتف" value="{{old('phone')}}"/>
                        @error('phone')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    @if(request()->segment(2) == 'trainers' || request()->segment(2) == 'doctors')
                        <div class="form-group col-md-6">
                            <label>الدفع</label>
                            <select name="salary_type" class="form-control form-control-solid">
                                <option value="" disabled selected>اختر نوع الدفع</option>
                                <option value=0 @if(old('salary_type')==0) selected @endif >بالحصة</option>
                                <option value=1 @if(old('salary_type')==1) selected @endif >بالشهر</option>
                            </select>
                            @error('salary_type')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>المرتب</label>
                            <input type="number" name="salary" class="form-control form-control-solid"
                                   placeholder="المرتب" value="{{old('salary')}}"/>
                            @error('salary')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    @endif

                    @if(Request::segment(2) == 'users' || Request::segment(2) == 'vendors')
                        <div class="form-group">
                            <label>الرصيد</label>
                            <input type="number" name="credit" class="form-control form-control-solid"
                                   placeholder="الرصيد" value="{{old('credit')}}"/>
                            @error('credit')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    @endif

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
