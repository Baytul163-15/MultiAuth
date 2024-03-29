<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quentity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }else{
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quentity, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    public function AddToMiniCart(){
        $carts = Cart::content();
        $cartsQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartsQty' => $cartsQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    /// remove mini cart 
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod 
}
