<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Transaction;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->offset : 0;
        $listings = Listing::with(['years', 'makes', 'models', 'bodies', 'dealer', 'current_condition', 'last_transaction'])
                            ->offset($offset)
                            ->limit(10)
                            ->get();
        return response()->json($listings);
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
        $listing = Listing::with(['years', 'makes', 'models', 'bodies', 'dealer', 'current_condition', 'last_transaction'])
                            ->where('id', $id)
                            ->first();

        return response()->json($listing);
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
        //
    }

    /**
     * Search Special Case
     * Will be done by POST method
     * @param Request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search= $request->search_str ? $request->search_str : '';
        $offset = $request->offset ? $request->offset : 0;

        $listings = Listing::with(['years', 'makes', 'models', 'bodies', 'dealer', 'current_condition', 'last_transaction'])
            ->join('years', 'years.id', '=', 'listings.year_id')
            ->join('makes', 'makes.id', '=', 'listings.make_id')
            ->join('models', 'models.id', '=', 'listings.model_id')
            ->where(function ($query) use ($search){
                $query->where('years.name', 'like', '%'.$search.'%')
                    ->orWhere('makes.name', 'like', '%'. $search. '%')
                    ->orWhere('models.name', 'like', '%'. $search. '%');
            })
            ->offset($offset)
            ->limit(10)
            ->select('listings.*')
            ->get();

        return response()->json($listings);
    }

    /**
     * Checkout or BackIn
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_transaction(Request $request)
    {
        $transaction = new Transaction;

        try{
            $transaction->check_type_id = $request->check_type;
            $transaction->customer_name = $request->name;
            $transaction->listing_id    = $request->listing_id;
            $transaction->condition_id  = $request->condition_id;

            $transaction->save();

        }catch(Exception $e){
            return response()->json(['status'=>'failed', 'message' => $e->getmessage()]);
        }

        return response()->json(['status' => 'success']);
    }
}
