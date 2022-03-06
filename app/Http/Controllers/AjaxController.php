<?php

namespace App\Http\Controllers;

use App\Image as ImageApp;
use App\Product;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
// use Image  as InterventionImage;
use Image;
class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:upload.image',
            'permission:upload_images_product',
            'permission:get.images',
            'permission:file.delete',
            'permission:get_subcategories',
            'permission:get_products_by_subcategory',
        ]);
    }
    public function get_products_by_subcategory(Request $request){
        if ($request->ajax()) {
            return datatables()->of(Product::where('category_id', $request->subcategory_id)->get())
            ->addColumn('btn', 'admin.category._actions')
            ->rawColumns(['btn'])
            ->toJson();
        }
    }
    public function upload_image(Request $request, $id){
        if ($request->ajax()) {
            $post = Post::find($id);
            $urlimages = [];
            $filesLink = array();
            if($request->hasFile('files')){
                $images=$request->file('files');
                
                foreach ($images as $key => $image) {
                    $nombre = time().'_'.$image->getClientOriginalName();
                    $ruta = public_path().'/images';
                    $image->move($ruta,$nombre);
                    $urlimages[]['url']='/images/'.$nombre;
                    $url = '/images/'.$nombre;
                    array_push($filesLink,$url);
                }
            }
            $post->images()->createMany($urlimages);
            return $filesLink;
        }
    }
    public function upload_images_product(Request $request, $id){
      
        $request->validate([
            'files.*' => ['required','dimensions:min_width=290px,max_width=310px,min_height=290px,max_height=310']
        ]);
        if ($request->ajax()) {
            $product = Product::find($id);
            $urlimages = [];
            $filesLink = array();
            if($request->hasFile('files')){
                $images=$request->file('files');

                foreach ($images as $key => $image) {
                    $nombre = time().'_'.$image->getClientOriginalName();

                    $formatted_image = Image::make($image);
                    $formatted_image->fit(300, 300);
                    $formatted_image->save(public_path('/image/'. $nombre));
                    $ruta = '/image/'.$nombre;
                    $urlimages[]['url'] = $ruta;
                    array_push($filesLink,$ruta);
                }
            }
            $product->images()->createMany($urlimages);
            return $filesLink;
        }
    }
    public function get_images($id){
        $post = Post::find($id);
        $images = $post->images->pluck('url');
        return response()->json($images);
    }
    public function file_delete(Request $request){
        $image = ImageApp::find($request->key);
        if(\File::isFile(public_path().$image->url)){
            \File::delete(public_path().$image->url);
        }
        $image->delete();
        return true;
    }
}
