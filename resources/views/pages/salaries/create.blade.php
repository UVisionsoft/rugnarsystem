<x-base-layout>
    <form action="{{route('salaries.store')}}" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <!--begin::Card body-->

                    <div class="card-header">
                        <h3 class="card-title">دفع راتب لموظف</h3>
                    </div>
                    @csrf
                    <div class="card-body pt-6">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="label-control">الفترة من</label>
                                <input type="text" class="form-control form-control-solid disabled" disabled readonly value="{{now()->startOfMonth()->toDateString()}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="label-control">الفترة الي</label>
                                <input type="text" class="form-control form-control-solid disabled" disabled readonly value="{{now()->endOfMonth()->toDateString()}}">
                            </div>


                            <div class="form-group col-md-6">
                                <label class="label-control">الموظف</label>
                                <select name="user_id" class="form-control form-control-solid">
                                    @foreach($empolyees as $id => $empolyee)
                                        <option value="{{$id}}">{{$empolyee}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-control">قيمة الراتب</label>
                                <input type="number" name="amount" class="form-control form-control-solid" value="0" >
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
