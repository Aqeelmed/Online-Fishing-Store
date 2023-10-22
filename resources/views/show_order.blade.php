<!DOCTYPE html>
<html lang="en" style="font-size:16px;">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .center {
        margin: auto;
        width: 70%;
        padding: 30px;
        text-align: center;
    }

    .table,
    th,
    td {
        border: 1px solid black;
    }

    .th_deg {
        padding: 10px;
        background-color: skyblue;
        font-weight: bold;
    }
    </style>
</head>

@include('layout.head')

<body>
    <div class="loader">
        <img style="width: 20%" src="{{asset('images/circles.svg')}}"/>
      </div>
    @include('layout.navbar')
    <div class="center">
        <table>
            <tr>
                <th class="th_deg">product_title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Prices</th>
                <th class="th_deg">Payment_status</th>
                <th class="th_deg">Delivery_status</th>
                <th class="th_deg">Images</th>
                <th class="th_deg">Cancel Order</th>
            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td><img height="100" width="180" src="product/{{$order->image}}"></td>
                <td>
                    @if($order->delivery_status=='processing')
                    <a onclick="return confirm('Are you sure to cancel the Order !!!')" class="btn btn-danger"
                        href="{{url('cancel_order', $order->id)}}">Cancel Order</a>
                    @else
                    <p style="color: blue;">Not Allowed</p>
                    @endif
                </td>
            </tr>


            @endforeach
        </table>
    </div>
    @include('layout.script')
</body>

</html>