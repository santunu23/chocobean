<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Products;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Cart;
use Session;


class AdminDashboard extends Controller
{
    public function index(){
        $hr_request=Products::all();
        return view('/admin/AdminDashboard')->with('hr_request',$hr_request);
    }

    public function create()
    {
         return view('/admin/createadminpanel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
          'name'=>'required',
          'price'=>'required',
          'brand'=>'required',
          'cover_image'=>'image||nullable||max:1999'
        ]);

        if($request->hasFile('cover_image')){
                  //Get filename with the extension
            $filenamewithExt=$request->file('cover_image')->getClientOriginalName();
            //Get only filename
            $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/uploads',$filenameToStore);
        }
        $listing=new Products;
        $listing->name=$request->input('name');
        $listing->price=$request->input('price');
        $listing->brand=$request->input('brand');
        $listing->admin=$request->input('admin');
        $listing->picture=$filenameToStore;
        $listing->save();
        return redirect('/admin/admindashboard')->with('success','Product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editfile=Products::find($id);
        return view('/admin/editItem')->with('editfile',$editfile);
     }

     public function newItem(){
     	return view('/admin/newItem');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'name'=>'required',
          'brand'=>'required'
        ]);

         $listing=Products::find($id);
        $listing->name=$request->input('name');
        $listing->price=$request->input('price');
        $listing->brand=$request->input('brand');
        $listing->save();

        return redirect('/admin/admindashboard')->with('success','Admin Panel updateed');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Products::find($id);
        $product->delete();
        return redirect('/admin/admindashboard')->with('error','Product Item Deleted');

     
    }

    public function temDelete(){
    	$deleterecord = DB::table('Products')
                ->where('deleted_at','>',1)
                ->get();

        return view('/admin/managedeleterecords')->with('deleterecord',$deleterecord);
    }

    public function perdelete($id){
          Products::onlyTrashed()->where('id',$id)->forceDelete();
          return redirect('/admin/managedeleterecords')->with('error','Item deleted permanantly');
        }

    public function restore($id){
          Products::withTrashed()->where('id',$id)->restore();
          return redirect('/admin/managedeleterecords')->with('success','Item restored');
      }   
       
    public function registerusers(Request $request){

    	$this->validate($request,[
          'name'=>'required',
          'email'=>'required',
          'password' => 'required|string|min:6|confirmed',
        ]);
        
        $userregister=new User;
        $userregister->name=$request->input('name');
        $userregister->email=$request->input('email');
        $userregister->password=Hash::make($request->input('password'));
        
        $userregister->save();
        return redirect('/admin/admindashboard')->with('success','Users added');

    }

    public function publicpage(){

    	 $hr_request=Products::all();
        return view('/publicpage')->with('hr_request',$hr_request);

    }

    public function getAddToCart(Request $request,$id){
    	$products=Products::find($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($products,$products->id);
        $request->session()->put('cart',$cart);
        return redirect('/publicpage');
    }

    public function calculateCart(){
           if(!Session::has('cart')){
            
            return view('shoppingcart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view("/shoppingcart",["products"=>$cart->items,"totalPrice"=>$cart->totalPrice]);

    }

     public function emptycart(Request $request){

        $data = $request->session()->flush();
        return view('/shoppingcart');
     }







}
