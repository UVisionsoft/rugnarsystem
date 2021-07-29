<x-base-layout>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <form action="" method="post">
                @csrf
                @forelse($purchase->details as $product)

                <table class="table">
                        <thead>
                        <td>Mark</td>
                        <td>Name</td>
                        <td>Price</td>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" name="items[]" value="{{$product->id}}"></td>
                            <td>
                                @if($product->service_id === null)
                                    <h4>{{$product->dog->name}}</h4>
                                @else
                                    <div>
                                        <h4>{{$product->dog->name}}</h4>
                                        <p style="color: red">{{$product->service->name}}</p>
                                    </div>
                                @endif

                            </td>
                            <td>{{$product->amount}}</td>
                        </tr>
                        </tbody>
                    </table>
                @empty
                    <h4> لايوجد منتجات لهذه الفاتورة </h4>
                @endforelse

                @if($purchase->details->count() > 0)
                    <input type="submit" class="btn btn-primary" name="action" value="استرجاع">
                    <input type="submit" class="btn btn-secondary" name="action" value="استرجاع كل الفاتورة">
                @endif
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
