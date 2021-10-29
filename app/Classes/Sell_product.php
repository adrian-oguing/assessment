<?php

namespace App\Classes;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class Sell_product{
    private $product_id = null;
    private $quantity = 0;

    public $message = "";

    public function __construct($product_id, $quantity)
    {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function sell()
    {
        $product = Product::find($this->product_id);
        if(empty($product))
        {
            $this->message = "Product not found";
            return false;
        }

        if($product->stocks < $this->quantity)
        {
            $this->message = "Not enough stock";
            return false;
        }
        
        DB::beginTransaction();
        try
        {
            $transaction = new Transaction;
            $transaction->product_id = $product->id;
            $transaction->amount = $product->price * $this->quantity;
            $transaction->quantity = $this->quantity;
            $transaction->save();

            $product->stocks  = $product->stocks - $this->quantity;
            $product->update();
            
            DB::commit();

        } catch (\Exception $e) 
        {
            DB::rollback();
            $this->message = $e->getMessage();
            return false;
        }
       
        $this->message = "Success";
        return true;
    }
}