<div class="khYus">
    <div class="container">
        <h3 class="text-center">All Products</h3>
        @foreach($products->chunk(5) as $chunk)
        <div class="row">
            @foreach($chunk as $item)
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{asset('images/'. $item->image)}}" class="rounded" alt="...">
                        </div>
                        <p class="pro_name">{{$item->product_name}}</p>
                        <h5>Tk ৳ {{$item->sell}}</h5>
                        <a href="{{route('product_details', $item->id)}}">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>