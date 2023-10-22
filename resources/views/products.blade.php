@extends('layout')
@section('content')

<!DOCTYPE html>
<html>

<body class="sub_page">
    @include('sweetalert::alert')
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Product Grid</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{url('product-details', $product->id)}}" class="option1">
                                    Product-Details
                                </a>
                                <a  class="option2">
                                <form action="{{url('add_cart',$product->id)}}"  method="Post">
                                 @csrf
                                 <div class="row">  
                                  <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:53px"> 
                                  </div>
                                  <div class="col-md-4">
                                     <input type="submit"  value="Add To Cart" style="">
                                  </div>
                                 </div>  
                              </form>
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$product->title}}
                            </h5>
                            @if($product->discount_price!=null)
                            <h5 style="color: red">
                                Discount Price
                                <br>
                                ${{$product->discount_price}}
                            </h5>

                            <h6 style="text-decoration: line-through; color: blue">
                                Price
                                <br>
                                ${{$product->price}}
                            </h6>

                            @else

                            <h4 style="color:blue">
                                 Price
                                <br>
                                ${{$product->price}}
                            </h4>
                            @endif


                        </div>
                    </div>
                </div>

                @endforeach
                <span>
                {{$products->links()}}
                </span>
            </div>
           
        </div>
    </section>
    <!-- end product section -->
    <!-- footer section -->

</body>

</html>



@endsection