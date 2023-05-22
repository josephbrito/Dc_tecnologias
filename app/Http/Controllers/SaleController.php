<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller {
    public function index() {
        return view("welcome");
    }

    public function create() {
        return view("sales.create");
    }

    public function review(Request $req) {
       $user = auth()->user();
       $businessman = $user->name;

       $client = $req->client;

       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;

       
       if($client == ""){
        $client = "Anônimo";
       }

       if(!$products || !$qtdy || !$price){
        return redirect("/")->with("msg_error", "Algo deu errado, tente novamente!");
       }

       return view("sales.review", [
        "businessman"=>$businessman,
        "client"=>$client,
        "products"=>$products,
        "qtds"=>$qtdy,
        "prices"=>$price
    ]);
       
    }

    public function store(Request $req) {
       $sales_table = new Sale;
       
       // Get user id for foreign key
       $user = auth()->user();
       $userid = $user->id;

       $client = $req->client;
       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;
       $installments = $req->installments;
       $dates = $req->date;
       $observations = $req->observations;
       $price_installments = $req->price_installments;

       for($i = 0; $i < count($observations); $i++){
        if($observations[$i] == null){
            $observations[$i] = "";
        }
       }

       if(!$client || !$products || !$qtdy || !$price || !$installments || !$dates){
            return redirect("/")->with("msg_error", "Algo deu errado! Tente novamente.");
       }

      $sales_table->client = $client;
      $sales_table->installments = $installments;
      $sales_table->total_price = array_sum($price);
      $sales_table->total_qty = array_sum($qtdy);
      $sales_table->user_id = $userid;
      $sales_table->dates = $dates;
      $sales_table->observations = $observations;
      $sales_table->price_of_installments = $price_installments;
     

      $sales_table->save();

      for($i = 0; $i < count($products); $i++){
        $products_table = new Product;
        
        $products_table->product = $products[$i];
        $products_table->qty = $qtdy[$i];
        $products_table->price = $price[$i];
        $products_table->sales_id = $sales_table->id;
        $products_table->save();
      }
    
      return redirect("/dashboard")->with("msg_success", "Venda adicionada com sucesso!");
    }

    public function home() {
        $user = auth()->user();
        $userid = $user->id;
        $sales = Sale::where("user_id", $userid)->get();
        $products = [];
        
        
        foreach($sales as $sale){
            $products_all = Product::all();
            foreach($products_all as $product){
                if($product->sales_id === $sale->id){
             
                    array_push($products, $product);
                }
            }
        }

        return view("dashboard", ["sales"=>$sales, "products"=>$products]);
    }

    public function destroy($id) {
        Product::where("sales_id", $id)->delete();
        Sale::findOrFail($id)->delete();

        return redirect("/dashboard")->with("msg_success", "Venda apagada com sucesso!");
    }

    public function edit($id) {
        $sales_table = Sale::findOrFail($id);
        $products_table = Product::where("sales_id", $sales_table->id)->get();

        return view("sales.edit", ["sale"=>$sales_table, "products"=>$products_table]);
    }

    public function edit_review(Request $req) {

       $sales_table = Sale::findOrFail($req->id);
       $products_table = Product::where("sales_id", $sales_table->id)->get();

       $user = auth()->user();
       $businessman = $user->name;

       $dates = $sales_table->dates;
       $installments = $sales_table->installments;
       $observations = $sales_table->observations;
       $price_installments = $sales_table->price_of_installments;

       $id = $req->id;
       $client = $req->client;
       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;
       
       if($client == ""){
        $client = "Anônimo";
       }

       if(!$products || !$qtdy || !$price){
        return redirect("/")->with("msg_error", "Algo deu errado, tente novamente!");
       }

       return view("sales.edit_review", [
        "businessman"=>$businessman,
        "id"=>$id,
        "client"=>$client,
        "products"=>$products,
        "qtds"=>$qtdy,
        "prices"=>$price,
        "installments"=>$installments,
        "dates"=>$dates,
        "observations"=>$observations,
        "price_installments" => $price_installments,
        "previousProducts" => $products_table
    ]);
    }

    public function update(Request $req) {
       $sales_table = Sale::findOrFail($req->id_sale);
          

       $client = $req->client;

       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;
       $installments = $req->installments;
       $observations = $req->observations;
       $dates = $req->date;
       $price_installments = $req->price_installments;

       $previousProduct = $req->previousProduct;

       for($i = 0; $i < count($observations); $i++){
        if($observations[$i] == null){
            $observations[$i] = "";
        }
       }

       if(!$client || !$products || !$qtdy || !$price || !$installments || !$dates){
            return redirect("/")->with("msg_error", "Algo deu errado! Tente novamente.");
       }

      $sales_table->client = $client;
      $sales_table->installments = $installments;
      $sales_table->total_price = array_sum($price);
      $sales_table->total_qty = array_sum($qtdy);
      $sales_table->observations = $observations;
      $sales_table->dates = $dates;
      $sales_table->price_of_installments = $price_installments;

      for($i = 0; $i < count($previousProduct); $i++){
        Product::where("sales_id", $sales_table->id)->where("product", $previousProduct[$i])->update([
            "product" => $products[$i],
            "qty" => $qtdy[$i],
            "price"=> $price[$i]
        ]);
      }


      $sales_table->update();
    
      return redirect("/dashboard")->with("msg_success", "Venda atualizada com sucesso!");

    }
}
