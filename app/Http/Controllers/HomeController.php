<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Sale;
use App\Product;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:home'
        ]);
    }
    public function index()
    {
        $comprasmes = Purchase::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(purchase_date,'%M %Y') as mes")
        )->groupBy('mes')->take(12)->get();
        $orders_of_the_day = Order::where('order_date', Carbon::now()->format('Y-m-d'))->take(5)->get();
        $orders_of_the_day_status = Order::where('order_date', Carbon::now()->format('Y-m-d'))
        ->select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status")
        )->groupBy('status')->get();
        $ventasmes = Sale::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(sale_date,'%M %Y') as mes")
        )->groupBy('mes')->take(12)->get();
        $ventasdia = Sale::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as total"),
            DB::raw("DATE_FORMAT(sale_date,'%D %M %Y') as date")
        )->groupBy('date')->take(30)->get();
        $most_ordered_products = OrderDetail::select(
            DB::raw("SUM(quantity) as total"),
            DB::raw("product_id as product_id")
        )->groupBy('product_id')->take(12)->get();
        $order_mes = Order::where('order_date', Carbon::now()->subdays(30)->format('Y-m-d'))->select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status")
        )->groupBy('status')->get();
        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(MONTH(c.purchase_date))=MONTH(curdate()) and c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(MONTH(v.sale_date))=MONTH(curdate()) and v.status="VALID") as totalventa');
        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and MONTH(v.sale_date)=MONTH(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos','order_mes','most_ordered_products','orders_of_the_day','orders_of_the_day_status'));
    }
}
