> Einstein:
<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Company;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /
     * Display a listing of the resource.
     */
    public function ProductList(Request $request)
    {
        // get the authenticated user
        $user = auth()->user();
    
        // check if the authenticated user is an admin (role 1)
        if ($user->role == 1) {
            // if admin, get all products from the database
            $list = DB::table('products')
            ->join('quantities', 'products.id', '=', 'quantities.product_id')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->select('products.id', 'companies.company_name', 'products.product_name', 'products.product_desc', 'products.item_per_carton', 'products.carton_quantity', 'quantities.total_quantity', 'quantities.remaining_quantity', 'products.weight_per_item', 'products.weight_per_carton', 'products.product_dimensions', 'products.product_image', 'products.date_to_be_stored')
            ->get();
    
        } else {
            // if not admin, get products owned by the user
            $list = DB::table('products')->where('user_id', $user->id)->get();
        }
    
        // return the view with the list of products
        return view('backend.product.list_product', compact('list'));
    }
    

    /
     * Show the form for creating a new resource.
     */
    public function ProductAdd()
    {
        $companies = Company::all();

        $allProducts = DB::table('products')->get();

        return view('backend.product.create_product', compact('allProducts', 'companies'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function ProductInsert(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'product_name' => 'required|string|max:255',
            'product_desc' => 'required|string',
            'weight_per_item' => 'required|numeric',
            'weight_per_carton' => 'required|numeric',
            'product_dimensions' => 'required|string|max:255',
            'date_to_be_stored' => 'required|date',
            'carton_quantity' => 'required|integer',
            'item_per_carton' => 'required|integer',
            'product_image' => 'required|image|max:2048'
        ]);
        
        $data = [
            'user_id' => auth()->user()->id,
            'company_id' => $request->company_id,
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'item_per_carton' => $request->item_per_carton,
            'carton_quantity' => $request->carton_quantity,
            'weight_per_item' => $request->weight_per_item,
            'weight_per_carton' => $request->weight_per_carton,
            'product_dimensions' => $request->product_dimensions,
            'date_to_be_stored' => $request->date_to_be_stored,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/Image', $filename);
            $data['product_image'] = $filename;
        }
        
        // Calculate the total quantity
        $total_quantity = $request->carton_quantity * $request->item_per_carton;
        
        // Insert data into the products table
        $product_id = DB::table('products')->insertGetId($data);
           
        if ($product_id) {
            // Insert data into the quantity table
            DB::table('quantities')->insert([
                'product_id' => $product_id,
'total_quantity' => $total_quantity,
                'sold_carton_quantity' => 0,
                'sold_item_quantity' => 0,
                'remaining_quantity' => $total_quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('product.index')->with('success','Product added successfully');
        } else {
            $notification = [
                'message' => 'Error',
                'alert-type' => 'error',
            ];
            return redirect()->route('product.index')->with($notification);
        }
    }
    
    

    public function ProductEdit($id)
    {
        $edit = DB::table('products')
                 ->join('quantity', 'products.id', '=', 'quantity.product_id')
                 ->select('products.*', 'quantity.remaining_quantity', 'quantity.carton_quantity', 'quantity.item_quantity')
                 ->where('products.id', $id)
                 ->first();
        return view('backend.product.edit_product', compact('edit'));
    }
    


    public function ProductUpdate(Request $request, $id)
{
    $data = array();
    $data['user_id'] = auth()->user()->id;
    $data['company'] = $request->company;
    $data['product_name'] = $request->product_name;
    $data['product_desc'] = $request->product_desc;
    $data['rack_location'] = $request->rack_location;    
    $data['weight_per_item'] = $request->weight_per_item; 
    $data['weight_per_carton'] = $request->weight_per_carton; 
    $data['product_dimensions'] = $request->product_dimensions;
    $data['date_to_be_stored'] = $request->date_to_be_stored;
    
    // Check if image is uploaded
    if ($request->file('product_image')) {
        $file = $request->file('product_image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);
        $data['product_image'] = $filename;
    }

    $update = DB::table('products')->where('id', $id)->update($data);

    if ($update) {
        // Update remaining_quantity
        $quantity_data = array();
        $quantity_data['remaining_quantity'] = $request->carton_quantity * $request->item_quantity;
        DB::table('quantity')->where('product_id', $id)->update($quantity_data);

        return Redirect()->route('product.index')->with('success','Product Updated Successfully!');                     
    } else {
        $notification = array(
            'message' => 'error',
            'alert-type' => 'error'
        );
        return Redirect()->route('product.index')->with($notification);
    }
}

    

public function ProductDelete ($id)
    {
    
        $delete = DB::table('products')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'message'=>'Product Deleted Successfully',
                            'alert-type'=>'success'
                            );
                            return Redirect()->back()->with($notification);                      
                            }
             else
                  {
                  $notification=array(
                  'message'=>'error ',
                  'alert-type'=>'error'
                  );
                  return Redirect()->back()->with($notification);

                  }

      }

      public function getProducts($company_id)
{
    $products = Product::where('company_id', $company_id)->pluck('product_name', 'id');
    return response()->json($products);
}

}
