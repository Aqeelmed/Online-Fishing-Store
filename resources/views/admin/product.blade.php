<!DOCTYPE html>
<html lang="en">

<head>
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
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input class="text_color" type="text" name="title" placeholder="Please Add product Title"
                                required="">
                        </div>
                        <div class="div_design">
                            <label>Product-Description :</label>
                            <input class="text_color" type="text" name="description"
                                placeholder="Please Add description Title" required="">
                        </div>
                        <div class="div_design">
                            <label>Product-Price: </label>
                            <input class="text_color" type="number" name="price" placeholder="Please Add price"
                                required="">
                        </div>
                        <div class="div_design">
                            <label>Discount-Price:</label>
                            <input class="text_color" type="number" name="disc_price" placeholder="Please Add price">
                        </div>
                        <div class="div_design">
                            <label>Product-Quantity</label>
                            <input class="text_color" type="number" min="0" name="quantity"
                                placeholder="Please Add quantity" required="">
                        </div>
                        <div class="div_design">
                            <label style="margin-right: 2%;">Product-Category:</label>
                            <select class="text_color" name="category" required="">
                                <option value="" selected="">Add a category here </option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <label style="margin-left: 11%;">Product Image Here :</label>
                            <input class="text_color" type="file" name="image" required="">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Add Product" class="btn btn-primary">
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