<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;

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
       $sales = new Sale;
       $user = auth()->user();
       $userid = $user->id;

       $client = $req->client;
       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;
       $installments = $req->installments;

       if(!$client || !$products || !$qtdy || !$price || !$installments){
            return redirect("/")->with("msg_error", "Algo deu errado! Tente novamente.");
       }

      $sales->client = $client;
      $sales->products = $products;
      $sales->installments = $installments;
      $sales->qtd = $qtdy;
      $sales->price = $price;
      $sales->user_id = $userid;

      $sales->save();
    
      return redirect("/dashboard")->with("msg_success", "Venda adicionada com sucesso!");
    }

    public function home() {
        $user = auth()->user();
        $userid = $user->id;
        $sales = Sale::where("user_id", $userid)->get();

        return view("dashboard", ["sales"=>$sales]);
    }

    public function destroy($id) {
        Sale::findOrFail($id)->delete();

        return redirect("/dashboard")->with("msg_success", "Venda apagada com sucesso!");
    }

    public function edit($id) {
        $sale = Sale::findOrFail($id);

        return view("sales.edit", ["sale"=>$sale]);
    }

    public function edit_review(Request $req) {
       $user = auth()->user();
       $businessman = $user->name;

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
        "prices"=>$price
    ]);
    }

    public function update(Request $req) {
       $sales = Sale::findOrFail($req->id_sale);
       $user = auth()->user();
       $userid = $user->id;

       $client = $req->client;
       $products = $req->product;
       $qtdy = $req->qtdy;
       $price = $req->price;
       $installments = $req->installments;

       if(!$client || !$products || !$qtdy || !$price || !$installments){
            return redirect("/")->with("msg_error", "Algo deu errado! Tente novamente.");
       }

      $sales->client = $client;
      $sales->products = $products;
      $sales->installments = $installments;
      $sales->qtd = $qtdy;
      $sales->price = $price;
      $sales->user_id = $userid;

      $sales->update();
    
      return redirect("/dashboard")->with("msg_success", "Venda adicionada com sucesso!");

    }
}
