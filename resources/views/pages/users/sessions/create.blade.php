<x-base-layout>
    @section('page-title', sprintf(" تسجيل جلسة جديدة ( %s ) ", $trainer->name))
    <div id="example"></div>


    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
        <template>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">التدريب</label>
                                <select v-model="activity" class="form-control form-control-solid">
                                    <option v-bind:value="null" :value="null" disabled>من فضلك اختر التدريب</option>
                                    <option v-bind:value="activity.id" v-for="activity in activities">
                                        @{{activity.name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">التاريخ</label>
                                <input type="date" class="form-control form-control-solid" v-model="date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">عدد الساعات</label>
                                <input type="number" class="form-control form-control-solid" v-model="hours">
                            </div>
                        </div>
                        <div class="col-md-12" v-if="dogs.length">
                            <label class="mt-5 text-dark form-label" for=""> الكلاب المسجلة ف التدريب </label>
                            <div class="form-check form-check-custom form-check-solid form-check-sm mt-2"
                                 v-for="dog  in dogs">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" v-model="selected"
                                           :value="dog"/>
                                    @{{ dog.dog.name }} (@{{ dog.remaining_hours }})
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-left">
                    <button @click="send" class="btn btn-primary mr-2">حفظ</button>
                </div>
            </div>
        </template>


    <script>
        const template = document.getElementsByTagName('template')[0].innerHTML;
        const compiledTemplate = Vue.compile(template);
        var vm = new Vue({
            el: '#example',
            data: {
                hours: 1,
                date: null,
                activity: null,
                selected: [],
                activities: @json($activities),
            },
            computed: {
                dogs: function () {
                    if (!this.activity)
                        return [];

                    let dogsInActivity = this.activities.filter(a => a.id === this.activity)[0];
                    if (dogsInActivity.length > 0)
                        return [];

                    return dogsInActivity.dog_activity.filter(dog => dog.remaining_hours >= this.hours);
                },
            },
            watch: {
                dogs(val){
                    let res = [];
                    this.selected.forEach(function (selectedDog){
                        if(val.filter(dog => dog.id === selectedDog.id).length > 0)
                            res.push(selectedDog);
                    });
                    this.selected = res;
                }
            },
            methods: {
                async send() {
                    const requestOptions = {
                        method: "POST",
                        headers: {"Content-Type": "application/json", "X-CSRF-TOKEN": "{{csrf_token()}}"},
                        body: JSON.stringify({
                            hours: this.hours,
                            dogs_activities: this.selected,
                            activity: this.activity,
                            date: this.date
                        })
                    };

                    const response = await fetch("{{route('accounts.trainers.sessions.store', $trainer->id)}}", requestOptions)
                    const data = await response.json();
                    if(response.ok)
                        window.location.href = data.to;
                },
            },
            render(createElement) {
                return compiledTemplate.render.call(this, createElement);
            }
        })
    </script>
    @endsection

</x-base-layout>
