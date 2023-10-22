<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
    .center {
        margin: auto;
        width: 70%;
        border: 2px solid yellow;
        text-align: center;
        margin-top: 40px;
        padding: 5%;
    }

    .font-size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }

    .image_size {
        width: 38%;
        height: 38%;
        margin-left: 32%;
    }

    .th_color {
        background: green;
    }

    .th_des {
        padding: 10px;
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
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <h2 class="font-size">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_des">Product-Title</th>
                        <th class="th_des">Description</th>
                        <th class="th_des">Quantity</th>
                        <th class="th_des">Category</th>
                        <th class="th_des">Price</th>
                        <th class="th_des">Discount</th>
                        <th class="th_des">Image</th>
                        <th class="th_des">Delete</th>
                        <th class="th_des">Update</th>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td><img class="image_size" src="/product/{{$product->image}}"></td>
                        <td><a class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Update</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>