<!DOCTYPE html>
<html lang="en" style="font-size:16px;">



<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fishing-Store</title>
    <style>
        .cart
        {
            border: 1px solid yellow;
            border-radius: 20px;
        }
    </style>    
</head>

@include('layout.head')

<body>
    @include('layout.navbar')


    <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 50px;">
        <div class="img-box">
            <img src="product/{{($detail->image)}}" alt="" style="width: 70%;">

        </div>
        <div class="detail-box">

            <h5>
                {{$detail->title}}
            </h5>
            @if($detail->discount_price!=null)
            <h5 style="color: red">
                Discount Price
                <br>
                ${{$detail->discount_price}}
            </h5>

            <h5 style="text-decoration: line-through; color: blue">
                Price
                <br>
                ${{$detail->price}}
            </h5>

            @else

            <h4 style="color:blue">
                Price
                <br>
                ${{$detail->price}}
            </h4>
            @endif
            <h6>Product-Category: {{$detail->category}}</h6>         
            <h6>Product-Description: {{$detail->description}}</h6>
            {{-- <h6>Available-Quantity: {{$detail->quantity}}</h6> --}}
            {{-- <form action="{{url('add_cart',$detail->id)}}"  method="Post">
                                 @csrf
                                 <div class="row">  
                                  <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:53px"> 
                                  </div>
                                  <div class="col-md-4">
                                     <input class="cart" type="submit"  value="Add To Cart" style="">
                                  </div>
                                 </div>  
                              </form> --}}

        </div>
    </div>
    </div>


    @include('layout.footer')

</body>

</html>