<x-base-layout>

    <div class="card mb-3">
        <img src="{{asset($dog->avatar)}}" height="350px" class="card-img-top" alt="{{$dog->name}} Image">
        <div class="card-body">
            <h5 class="card-title">{{$dog->name}}</h5>
            <p class="card-text">{{$dog->notes}}</p>
            <p class="card-text">مالك الكلب : <small class="text-muted">{{$dog->user->name}}</small></p>
        </div>
    </div>

</x-base-layout>
