
@extends('layout')
@section('content')


 <!DOCTYPE html>
<html>
  
   <body class="sub_page">
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Testimonial</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Customer's Testimonial
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="{{asset('images')}}/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              “I visited [business name] and tried [product or service the customer used].
                              The experience was great, it [advantage enjoyed by the customer]. I'd highly recommend them to anyone.”
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="{{asset('images')}}/client-2.png" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Jhon
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Excellent customer service ​​ Beautifil products displayed on a neat website. 
                              You can contact the customer service in multiple manners
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="{{asset('images')}}/client-3.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Steve Eden
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              My Pet Fish has always been one of my favorites, as I like reading about this boy who is inspired to keep fish from his friend and neighbor and then eventually goes into the hobby himself. This is a MUST READ book for beginning aquarium hobbyists as 
                              it is also very informative about the basics that you need to know in setting up your first aquarium.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->
      <!-- footer section -->
    
      <!-- footer section -->
      <!-- jQery -->
  
   </body>
</html>
    
   </body>
</html>
      @endsection