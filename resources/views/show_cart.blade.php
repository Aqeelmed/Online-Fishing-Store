<!DOCTYPE html>
<html lang="en" style="font-size:16px;">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart-Page</title>
     <!-- preloader core css -->
      
     <link rel="stylesheet" type="text/css" href="{{asset('css')}}/loader.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
    <style>
    .center {
        margin: auto;
        width: 55%;
        text-align: center;
        padding: 50px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .desgn {
        font-size: 15px;
        padding: 10px;
        background: skyblue;
    }

    .img_desgn {
        height: 100px;
        width: 100px;
    }

    .total_deg {
        font-size: 20px;
        padding: 40px;
    }
    </style>
</head>

@include('layout.head')

<body>
    <div class="loader">
        <img style="width: 20%" src="{{asset('images/circles.svg')}}"/>
      </div>
    @include('sweetalert::alert')
    @include('layout.navbar')
    <div class="center">
        @if (session()->has('message'))
        <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <table>
            <tr>
                <th class="desgn">Product-Title</th>
                <th class="desgn">Product-Quantity</th>
                <th class="desgn">Price</th>
                <th class="desgn">Image</th>
                <th class="desgn">Action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $cart)
            <tr>
                <th>{{$cart->product_title}}</th>
                <th>{{$cart->quantity}}</th>
                <th>${{$cart->price}}</th>
                <th><img class="img_desgn" src="/product/{{$cart->image}}"></th>
                <td><a class="btn btn-danger" onclick="confirmation(event)"
                        href="{{url('/remove_cart', $cart->id)}}">Remove Product</a></td>

            </tr>
            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach

        </table>
        <div>
            <h4 class="total_deg">Total Price: ${{$totalprice}}</h4>
        </div>
        <div>
            <h1>Proceed To Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            {{-- <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a> --}}
        </div>
    </div>
    @include('layout.footer')
    <script>
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to cancel the order",
                text: "You will not able to revert this!",
                icon: "Warning",
                buttons: true,
                dangerMode: true,
            })
            .then((WillCancel)=>{
                if(WillCancel) {

                   window.location.href =  urlToRedirect;
                }
            });
        }
    </script>
    @include('layout.script')
    
</body>

</html>