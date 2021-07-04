<x-base-layout>
    @section('page-title', 'تسجيل جلسة جديدة')
    <div id="example"></div>


    @section('scripts')
            <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
            <template>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">التدريب</label>
                                <select v-model="activity"  class="form-control form-control-solid">
                                    <option disabled value="">من فضلك اختر التدريب</option>
                                    <option v-bind:value="activity.id" v-for="activity in activities">@{{activity.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">عدد الساعات</label>
                                <input type="number" class="form-control form-control-solid" v-model="hours">
                            </div>
                        </div>
                        <div class="col-md-12" v-if="dogs.length">
                            <label class="mt-5 text-dark form-label" for=""> الكلاب المسجلة ف التدريب </label>
                                <div class="form-check form-check-custom form-check-solid form-check-sm mt-2" v-for="dog in dogs">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"/>
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
                var data = {
                    hours: 1,
                    activity: null,
                    activities: [],
                }

                var computed = {
                  dogs: function (){
                      if(! this.activity)
                          return [];

                      let dogsInActivity = this.activities.filter(a => a.id === this.activity)[0];
                      if(dogsInActivity.length > 0)
                          return [];

                      return dogsInActivity.dog_activity.filter(dog => dog.remaining_hours >= this.hours);
                  }
                };

                var methods = {
                    send(){},
                }
                var vm = new Vue({
                    el: '#example',
                    data: data,
                    computed: computed,
                    methods:methods,
                    render(createElement) {
                        return compiledTemplate.render.call(this, createElement);
                    },
                    async created(){
                        const response = await fetch("",{
                            headers:{
                                'Content-Type':'application/json',
                                'Accept':'application/json'
                            }
                        });
                        const data = await response.json();
                        this.activities = data;
                    }
                })
            </script>
    @endsection
</x-base-layout>
