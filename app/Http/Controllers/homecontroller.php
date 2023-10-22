<?php

namespace App\Http\Controllers;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product; 
use Illuminate\Http\Request;
use App\Http\Controllers\user;
use App\Models\User as ModelsUser;
use Illuminate\support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class homecontroller extends Controller
{
    public function home(){
       
        return view('home');
    } 
    public function about(){
        return view('about');
    } 
    public function contact(){
        return view('contact');
    } 
    public function contacts(){
        return view('contact');
    } 
    public function blog(){
        return view('blog');
    } 
    public function testimonial(){
        return view('testimonial');
    } 
    public function products(){
        $products=Product::paginate(3);
        return view('products',compact('products'));
    } 
    
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
       // return $usertype;
       
        if($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=ModelsUser::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue= $total_revenue + $order->price;
            }
               $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
               $total_processing=order::where('delivery_status','=','processing')->get()->count();
               $total_ordercancelled=order::where('delivery_status','=','You cancelled the Order')->get()->count();
           
            return view('admin.index', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing','total_ordercancelled'));
        }
         else
         {
           
            return view('home');
         } 

    } 
    public function product_details($id)
    {

        $detail = Product::find($id);
       return view('product-details', compact('detail'));
    }

     public function add_cart(Request $request,$id)
     {
         if (auth::id())
        {
            if (Auth::id())
            {
                $user=Auth::user();
                $product=Product::find($id);
                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                if ($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity;
                }
                else
                {
                    $cart->price=$product->price * $request->quantity;
                }
               
                $cart->image=$product->image;
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;

                $cart->save();

                Alert::success('Product Added Successfully','We have added product to the cart');    
                return redirect()->back();
            }
        }
        else
         {
         return redirect('login');
         }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
       
    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect('show_cart');
    }

   public function cash_order()
   {
    $user=Auth::user();
    $userid=$user->id;
    $data=Cart::where('user_id','=',$userid)->get();
    foreach($data as $data)
    {
        $order=new Order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';
        $order->save();
        $cart_id=$data->id;
        $cart=Cart::find($cart_id);
        $cart->delete();
    }
        return redirect()->back()->with('message','We have Recieved your Order.We will connect you soon...');
   }


//    public function stripe($totalprice)
//    {
      
//       return view('stripe', compact('totalprice'));
//    }

//    public function stripePost(Request $request)
//     {
       
      
//         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
//         Stripe\Charge::create ([
//                 "amount" => 100 * 100,
//                 "currency" => "usd",
//                 "source" => $request->stripeToken,
//                 "description" => "Thanks for the Payment" 
//         ]);
         
//         $user=Auth::user();
//         $userid=$user->id;
//         $data=Cart::where('user_id','=',$userid)->get();
//         foreach($data as $data)
//         {
//             $order=new Order;
//             $order->name=$data->name;
//             $order->email=$data->email;
//             $order->phone=$data->phone;
//             $order->address=$data->address;
//             $order->user_id=$data->user_id;
//             $order->product_title=$data->product_title;
//             $order->price=$data->price;
//             $order->quantity=$data->quantity;
//             $order->image=$data->image;
//             $order->product_id=$data->product_id;
//             $order->payment_status='Paid';
//             $order->delivery_status='processing';
//             $order->save();
//             $cart_id=$data->id;
//             $cart=Cart::find($cart_id);
//             $cart->delete();
//         }
      
//         Session::flash('success', 'Payment successful!');
              
//         return back();
    // }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=', $userid)->get();
            return view('show_order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='You cancelled the Order';
        $order->save();
        return redirect()->back();
    }

}