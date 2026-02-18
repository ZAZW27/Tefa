<?php

namespace App\Http\Controllers;

use App\Models\Pembelian; 
use App\Models\Cart; 
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 

class CheckoutController extends Controller
{
    public function store(Request $req){
        try{
            $req->validate([
            'items' => 'required|array', 
            'items.*.id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1', 
        ]); 

        $pembelian = Pembelian::create([
            'user_id' => Auth::id(), 
            'status' => 'pending',
        ]); 

        foreach($req->items as $item) {
            Cart::create([
                'pembelian_id' => $pembelian->id, 
                'product_id' => $item['id'], 
            ]); 
        }

        return response()->json(['message' => 'Order placed successfully!']); 

    } catch (\Exception $e) {
        // This ensures your JS gets a JSON error message, not an HTML page
        return response()->json(['message' => $e->getMessage()], 500);
    }
    }
}
