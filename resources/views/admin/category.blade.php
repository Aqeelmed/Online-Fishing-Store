<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style>
             .div_center{
                text-align: center;
                padding-top: 40px;
             }
             .h2_font
             {
                font-size: 40px;
                padding-bottom: 40px;
             }
             .input_color
             {
                color: black;
             }
             .center
             {
              margin: auto;
              width : 50%;
              text-align: center;
              margin-top: 30px;
              border: 3px solid yellow;
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
                <h2 class="h2_font">Add category</h2>
                
                <form action="{{url('/add_category')}}" method="POST">
                 @csrf

                    <input class="input_color" type="text" name="category" placeholder="Write Category Name">
                    <input type="submit" name="submit" class="btn btn-primary" value="Add category">

                </form>

                <table class="center">
                  <tr>
                    <td>Catogery Name</td>
                    <td>Action</td>
                  </tr>
                  @foreach($data as $data)

                  <tr>
                    <td>{{$data->category_name}}</td>                   
                    <td>
                         <a onclick="return confirm('Are you Sure to Delete this Record')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
            </div>

          </div>
        </div>  
         <!-- container-scroller -->
     <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>