<x-base-layout>
    <form action="" method="POST">
        @csrf
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">العملة</label>
                            <select name="currency" class="form-control form-control-solid">
                                <option {{ (isset($settings['currency']) && $settings['currency'] === 'SAR') ? "selected":""}} value="SAR">SAR</option>
                                <option {{ (isset($settings['currency']) && $settings['currency'] === 'EGP') ? "selected":""}} value="EGP">EGP</option>
                                <option {{ (isset($settings['currency']) && $settings['currency'] === 'USD') ? "selected":""}} value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> قيمة الضريبة %</label>
                            <input type="number" name="tax_amount" class="form-control form-control-solid"
                                   value="{{$settings['tax_amount'] ?? 14}}" max="100" min="0" step="1">
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Card body-->
            <div class="card-footer text-left">
                <button type="reset" class="btn btn-secondary">الغاء</button>
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
            </div>
        </div>
        <!--end::Card-->
    </form>

</x-base-layout>
