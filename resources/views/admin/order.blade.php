<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
    .deg {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }

    .table_deg {
        border: 2px solid white;
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .th_deg {
        background-color: skyblue;
    }

    .td_deg {
        font-size: smaller;
    }

    .img_size {
        width: 200px;
        height: 100px;
    }
    </style>
</head>

<body>
    <div class="loader">
        <img style="width: 20%" src="{{asset('images/circles.svg')}}"/>
      </div>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="deg">All Orders</h1>
                <div style="margin: auto;  padding-left: 400px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" style="color: black" placeholder="Search for something">

                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>product_title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment-Status</th>
                        <th>Delivery-Status</th>
                        <th>Image</th>
                        <th>Delivery</th>
                        <th>Print PDF</th>
                        {{-- <th>Send Email</th> --}}

                    </tr>
                    @forelse($order as $order)
                    <tr class="td_deg">
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img class="img_size" src="/product/{{$order->image}}"></td>
                        <td>
                            @if($order->delivery_status=='processing')
                            <a href="{{url('delivered', $order->id)}}"
                                onclick="return confirm('Are you sure this product is delivered !!!')"
                                class="btn btn-primary">Delivered</a>
                            @else
                            <p style="color: green">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>
                        {{-- <td>
                            <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Send Email</a>
                        </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan= "17">No Data Found For your related Search</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>