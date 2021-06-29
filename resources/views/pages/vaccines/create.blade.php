<x-base-layout>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Card body-->

        <div class="card-header">
            <h3 class="card-title">تطعيم جديد</h3>
        </div>
        <form action="{{route('vaccines.store')}}" method="post">
            @csrf
            <div class="card-body pt-6">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="label-control">اسم التطعيم :</label>
                        <input dir="auto" name="name" type="text" class="form-control form-control-solid" value="{{old('name')}}"/>
                        @error('name')
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