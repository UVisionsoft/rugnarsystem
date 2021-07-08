<x-base-layout>

    <div class="container-fluid dash-row">

        <div class="row">

                   <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-users" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">المستخدمين</h3>
                           <h5 class="ml-3">{{$data['users']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('accounts.users.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>
                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-user-md" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">الاطباء</h3>
                           <h5 class="ml-3">{{$data['doctors']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('accounts.doctors.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>

                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-user-clock" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">المدربين</h3>
                           <h5 class="ml-3">{{$data['trainers']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('accounts.trainers.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>

                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-dog" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">الكلاب</h3>
                           <h5 class="ml-3">{{$data['dogs']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('dogs.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>

                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-tasks" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">التدريبات</h3>
                           <h5 class="ml-3">{{$data['activities']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('activities.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>

                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-syringe" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">التطعيمات</h3>
                           <h5 class="ml-3">{{$data['vaccines']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('vaccines.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>

                  <div class="db-block bg-secondary col-3 m-2">
                       <div class="db-icon text-center m-2">
                           <i class="fas fa-hotel" style="font-size: 50px"></i>
                       </div>
                       <div class="db-data">
                           <h3 class="mt-3 ml-3">الاستضافات</h3>
                           <h5 class="ml-3">{{$data['hospitalities']}}</h5>
                       </div>
                           <div class="db-more">
                               <a href="{{route('hospitalities.index')}}"> لمزيد من المعلومات </a>
                           </div>
                   </div>


        </div>

    </div>

</x-base-layout>
