<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    <style>
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .font_size {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color {
        color: black;
    }

    label {
        display: inline-block;
        width: 200px;
        border: 1px solid yellow;
        padding: 7px;
    }

    .div_design {
        padding-bottom: 8px;
    }
    </style>
</head>

<body>
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
                <div class="div_center">
                    <h1 class="font_size">Update-Product</h1>
                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input class="text_color" type="text" name="title" placeholder="Please Add product Title"
                                required="" value="{{$product->title}}">
                        </div>
                        <div class="div_design">
                            <label>Product-Description :</label>
                            <input class="text_color" type="text" name="description"
                                placeholder="Please Add description Title" required=""
                                value="{{$product->description}}">
                        </div>
                        <div class="div_design">
                            <label>Product-Price: </label>
                            <input class="text_color" type="number" name="price" placeholder="Please Add price"
                                required="" value="{{$product->price}}">
                        </div>
                        <div class="div_design">
                            <label>Discount-Price:</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="Please Add disc_price"
                                value="{{$product->discount_price}}">
                        </div>
                        <div class="div_design">
                            <label>Product-Quantity</label>
                            <input class="text_color" type="number" min="0" name="quantity"
                                placeholder="Please Add quantity" required="" value="{{$product->quantity}}">
                        </div>
                        <div class="div_design">
                            <label style="margin-right: 5%;">Product-Category:</label>
                            <select class="text_color" name="category" required="">
                                <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <label style="margin-right: 23%;">Current product Image:</label>
                            <img style="margin:auto;margin-right: 38%;margin-top: -3%;" height="100" width="48px" src="/product/{{$product->image}}">
                        </div>
                        <div class="div_design">
                            <label style="margin-left: 11%;">Product Image Here :</label>
                            <input class="text_color" type="file" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Update Product" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>