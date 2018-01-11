<?php
namespace App\Models;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $products = [];

    public function __construct()
    {
        if ( Session::has( 'cart' ) )
        {
            $this->products = Session::get( 'cart' )->products;
        }
    }

    public function addProduct( $product_id )
    {
        if ( isset( $this->products[ $product_id ] ) )
        {
            $this->products[ $product_id ][ 'quantity' ]++;
        }
        else
        {
            $this->products[ $product_id ] = [ 'product_id' => $product_id, 'quantity' => 1 ];
        }
    }

    public function removeProduct( $product_id, $all_units = true )
    {
        if ( $all_units )
        {
            unset( $this->products[ $product_id ] );
        }
        else
        {
            $this->products[ $product_id ][ 'quantity' ]--;

            if (empty( $this->products[ $product_id ][ 'quantity' ] ) )
            {

                unset( $this->products[ $product_id ] );

            }
        }
    }
    public function removeAll () {
        $this->products = [];
    }
    public function getTotalProductsNumber()
    {
        $total_products_number = 0;
        foreach ( $this->products as $product)
        {
            $total_products_number += $product[ 'quantity' ];
        }
        return $total_products_number;
    }
}