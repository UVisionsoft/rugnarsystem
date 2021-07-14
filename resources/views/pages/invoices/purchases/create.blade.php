<x-base-layout>
    <div id="app">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">فاتورة مشتريات جديدة</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">المورد</label>
                            <select v-model="form.supplier" class="form-control form-control-solid">
                                <option :disabled="true" :value="{}"> من فضلك اختر المورد اولاً</option>
                                <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier">
                                    @{{supplier.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">الرصيد</label>
                        <input type="number" class="form-control form-control-solid" :disabled="true" :readonly="true"
                               :value="form.supplier.credit">
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <h3>
                        <div class="row">
                            <div class="col-md-11">الوسائل الحية</div>
                            <div class="col-md-1 text-left">
                                <button @click="addNewRow" class="btn btn-primary btn-icon">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>

                    </h3>

                    <div class="col-md-12">
                        <table class="table table-bordered" v-if="form.dogs.length > 0">
                            <thead class="darkTheme">
                            <th>#</th>
                            <th>الفصيلة</th>
                            <th>النوع</th>
                            <th>السن (بالشهور)</th>
                            <th>السعر</th>
                            <th></th>
                            </thead>

                            <tbody>
                            <tr v-for="(dog, index) in form.dogs">
                                <td>@{{ index }}</td>
                                <td>
                                    <select class="form-control form-control-solid" v-model="dog.faction">
                                        <option :disabled="true" :value="null">اختر الفصيلة</option>
                                        <option v-for="faction in factions" :value="faction">@{{ faction.name }}
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-solid" v-model="dog.gender">
                                        <option :disabled="true" :value="null">اختر النوع</option>
                                        <option value="male">ذكر</option>
                                        <option value="female">انثي</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control form-control-solid" type="number" min="0" v-model="dog.age">
                                </td>
                                <td>
                                    <input class="form-control form-control-solid" type="number" min="0" v-model="dog.price">
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-icon" @click="removeRow(index)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-else>
                            <div class="well text-center"> من فضلك اضف وسائل حية اولاً</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div v-if="form.dogs.length > 0" class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> الاجمالي </label>
                                    <input class="form-control form-control-solid" :disabled="true" :readonly="true"
                                           type="number" min="0" v-model="total">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> الخصم </label>
                                    <input class="form-control form-control-solid" type="number" min="0"
                                           v-model="form.discount">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">الضريبة (%)</label>
                                    <input class="form-control form-control-solid" type="number" min="0"
                                           v-model="form.tax">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> الاجمالي بعد الخصم و الضريبة </label>
                                    <input class="form-control form-control-solid" type="number" min="0"
                                           :disabled="true" :readonly="true"
                                           v-model="total_discount_tax">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> المدفوع </label>
                                    <input class="form-control form-control-solid" type="number" min="0" v-model="form.paid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> المتبقي من مبلغ الفاتورة </label>
                                    <input class="form-control form-control-solid" type="number" min="0" :disabled="true" :readonly="true" v-model="rest">
                                </div>
                            </div>

                            <div class="col-md-12 mt-10">
                                <div class="form-group">
                                    <label for=""> المتبقي من رصيد العميل </label>
                                    <input style="color:red" class="form-control form-control-solid" type="number" min="0" :disabled="true" :readonly="true" v-model="restOfCredit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-left">
                <button @click="send" class="btn btn-primary mr-2">حفظ</button>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

        <script>
            // when life is settled, load up the fun stuff
            new Vue({
                el: '#app',
                // define data - initial display text
                data: {
                    form: {
                        supplier: {},
                        dogs: [{
                            faction: null,
                            gender: null,
                            age: 12,
                            price: 0,
                        }],
                        paid: 0,
                        discount: 0,
                        tax: 0,
                    },
                    suppliers: @json($suppliers),
                    factions: @json($factions)
                },
                computed: {
                    total: function () {
                        let total = 0
                        this.form.dogs.forEach(function (dog) {
                            total += parseInt(dog.price);
                        })
                        return total;
                    },
                    total_discount_tax: function () {
                        let total_discount_tax = 0;
                        let discountAmount = parseInt(this.form.discount) ?? 0;
                        let taxPercent = parseInt(this.form.tax) ?? 0;
                        let total = parseInt(this.total) ?? 0;

                        let afterDiscount = 0;
                        if (discountAmount > 0) {
                            afterDiscount = total - discountAmount;
                        } else {
                            afterDiscount = total;
                        }

                        if (taxPercent > 0) {
                            let tax_amount = (taxPercent / 100) * afterDiscount
                            total_discount_tax = afterDiscount + tax_amount;
                        } else {
                            total_discount_tax = afterDiscount;
                        }

                        return total_discount_tax;

                    },
                    rest: function () {
                        if(this.form.paid > this.total_discount_tax)
                            return 0;

                        return this.total_discount_tax - this.form.paid
                    },
                    restOfCredit: function (){
                        let paid = this.form.paid;
                        let totalCredit = this.total_discount_tax - this.form.supplier.credit;
                        return totalCredit - paid;
                    }
                },
                methods: {
                    async send(){
                        const requestOptions = {
                            method: "POST",
                            headers: {"Content-Type": "application/json", "X-CSRF-TOKEN": "{{csrf_token()}}"},
                            body: JSON.stringify({
                                items: this.form.dogs,
                                discount: parseInt(this.form.discount),
                                paid: parseInt(this.form.paid),
                                tax: parseInt(this.form.tax),
                                supplier: this.form.supplier,
                                rest: parseInt(this.rest),
                                total: parseInt(this.total),
                                total_discount_tax: parseInt(this.total_discount_tax),
                            })
                        };
                        const response = await fetch("{{route('invoices.purchases.store')}}", requestOptions)
                        const data = await response.json();
                        console.log(data);
                    },
                    addNewRow: function () {
                        this.form.dogs.push({
                            faction: null,
                            age: 12,
                            gender: null,
                            price: 0,
                        });
                    },
                    removeRow: function (index) {
                        this.form.dogs.splice(index, 1);
                    }
                },
                watch: {
                    "form.discount": function (discount) {
                        if (discount > this.total) {
                            this.form.discount = 0;
                        }
                    },
                    "form.tax": function (tax) {
                        if (tax > 100) {
                            this.form.tax = 100;
                        }
                    },
                    // "form.paid": function (paid) {
                    //     if (paid > this.total_discount_tax + this.form.supplier.credit) {
                    //         this.form.paid = this.total_discount_tax + this.form.supplier.credit;
                    //     }
                    // }
                }
            })
        </script>

    @endsection

</x-base-layout>
