<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function book () 
    { 
        $book = Book::all();
        return view('books.show',compact('book'));
    }

    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }
   
    public function addToCart( Request $request, $id ) {
        $cart = new Cart();
        $cart->addProduct( $id ); 
        $request->session()->put( 'cart', $cart );
        return redirect()->home();
    }

    public function getReduceByOne($id) {
        $cart = new Cart();
        $cart->removeProduct( $id, false );
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function getRemoveItem($id ) {
        $cart = new Cart();
        $cart->removeProduct($id, true);
        Session::put('cart', $cart);
        return redirect()->back();

    }
    public function getCart()
    {
        $cart = new Cart();

        $books = Book::find( array_keys( $cart->products ) );

        $total_price = 0;

        foreach ( $books as $book )
        {
            $book->quantity = $cart->products[ $book->id ][ 'quantity' ];
            $total_price += $book->quantity * $book->price;
        }

        return view( 'add.add', [ 'books' => $books, 'totalPrice' => $total_price ] );
    }
    public function orderCompleted() {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        else {
            DB::table('orders')->insert(
                array(
                    'user_id'     =>   Auth::id(), 
                    'completed'   =>   true,
                )
            );
            $cart = new Cart();
            $cart->removeAll();
            Session::put('cart', $cart);
            return redirect()->route('home');
        }
    }
}
