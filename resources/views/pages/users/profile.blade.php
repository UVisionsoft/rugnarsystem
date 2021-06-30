<x-base-layout>

    <div class="card mb-3">
        <img src="url({{$user->avatar}})" height="350px" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">{{$user->email}}</p>
        </div>
    </div>

</x-base-layout>
