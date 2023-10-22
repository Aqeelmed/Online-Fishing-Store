<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2>Order Detail</h2>
    Customer Name :<h2>{{$order->name}}</h2>
    Customer Email :<h2>{{$order->email}}</h2>
    Customer Phone :<h2>{{$order->phone}}</h2>
    Customer Address :<h2>{{$order->address}}</h2>
    Customer ID :<h2>{{$order->user_id}}</h2>
  Product Name:  <h2>{{$order->product_title}}</h2>
  Product Price:  <h2>{{$order->price}}</h2>
  Product Quantity:  <h2>{{$order->quantity}}</h2>
  Product Status:  <h2>{{$order->payment_status}}</h2>
  Product ID:  <h2>{{$order->product_id}}</h2>

  <br><br>
  <img height="200" width="450"src="product/{{$order->image}}">
</body>
</html>