<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">تعديل بيانات مدير</h3>
        </div>
        <form action="{{route('accounts.'.request()->segment(2).'.update', $user->id)}}" method="post">
            @method('PATCH')
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="label-control">اسم المستخدم :</label>
                        <input dir="auto" name="name" type="text" class="form-control form-control-solid"
                               placeholder="اسم المستخدم" value="{{ old('name')?? $user->name }}"/>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>البريد الالكتروني:</label>
                        <input dir="auto" name="email" type="email" class="form-control form-control-solid"
                               placeholder="البريد الالكتروني" value="{{ old('email') ?? $user->email}}"/>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>كلمة المرور</label>
                        <input type="text" name="password" class="form-control form-control-solid"
                               placeholder="كلمة المرور" value="{{ old('password') }}"/>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div><small class=" text-black"> اتركها فارغه حتي لا يتم تغييرها </small></div>
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
