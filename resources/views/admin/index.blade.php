<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
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
      @include('admin.body')  
         <!-- container-scroller -->
     <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>