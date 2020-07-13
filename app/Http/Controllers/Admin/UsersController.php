<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerArea;
use App\User;
use App\UserPermissions;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {

        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customer = CustomerArea::with('details')->get();
        // dd($customer->details->name);
        // return view('/pages/admin/customer',compact('customer'));

        try{
            $customerdata = User::with('customer')->orderBy('id','DESC')->get();
        }catch (Exception $e) {
            $customerdata = [];
        }
        // dd($customerdata->toArray());
        return view('/pages/admin/customer',compact('customerdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerdata = User::destroy($id);
        // dd($id);
        // DB::table('ps_customer_area')->where('user_id','=',$id)->delete();
        // DB::table('ps_order')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_attributes')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_details')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_details_final')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_history')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_return')->where('user_id','=',$id)->delete();
        // DB::table('ps_payment')->where('user_id','=',$id)->delete();
        // DB::table('ps_split_order_shipping_address')->where('user_id','=',$id)->delete();
        // DB::table('ps_order_return')->where('user_id','=',$id)->delete();
        // $customerdata = User::with('customer')->where('id', $id)->delete();

        // $postl =  Post::with('likes')->whereId($post)->delete();
        // $customerdata = User::destroy($id);
        // $customerarea = CustomerArea::where('user_id', $user_id)->delete();
        // $permission = UserPermissions::where('user_id', $user_id)->delete();
        return redirect()->back()->with('status' , 'Deleted');
    }
    // public function deleteCustomer($id)
    // {
    //     $customerarea = CustomerArea::where('user_id', $user_id)->delete();
    //     $permission = UserPermissions::where('user_id', $user_id)->delete();
    //     return redirect()->back()->with('status' , 'Deleted');
    // }
}
