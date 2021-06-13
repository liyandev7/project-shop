<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Product::query();

        if ($keyword = request()->get('search')) {
            $query->where('title', 'LIKE', "%$keyword%")->orWhere('price', 'LIKE', "%$keyword%")->orWhere('count', 'LIKE', "%$keyword%");
        }
        $products = $query->orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'count' => ['required', 'max:100', 'integer'],
            'view_count' => ['required'],
            'price' => ['required'],
            'category' => ['required'],
            'attributes' => ['array'],
            'image' => 'required',
            'slider' => ['required'],
        ]);

        $product = auth()->user()->products()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'count' => $data['count'],
            'view_count' => $data['view_count'],
            'price' => $data['price'],
            'image' => $data['image'],
            'slider' => $data['slider'],
        ]);

        $product->categories()->sync($data['category']);

        $attributes = collect($data['attributes']);
        $attributes->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value'])) {
                return;
            }

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );

            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });

        return redirect(route('products.index'))->with('success', 'محصول شما با موفقیت ایجاد شد .');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'count' => ['required', 'max:100', 'integer'],
            'view_count' => ['required'],
            'price' => ['required'],
            'category' => ['required'],
            'attributes' => ['array'],
            'image' => 'required',
            'slider' => ['required'],
        ]);

        $product->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'count' => $data['count'],
            'view_count' => $data['view_count'],
            'price' => $data['price'],
            'image' => $data['image'],
            'slider' => $data['slider'],
        ]);

        $product->categories()->sync($data['category']);

        $product->attributes()->detach();
        $this->attachAttributesToProduct($product, $data);

        return redirect(route('products.index'))->with('info', 'محصول شما با موفقیت بروزرسانی شد .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect(route('products.index'))->with('danger', 'محصول شما با موفقیت حذف شد .');

    }



    /**
     * @param Product $product
     * @param array $validData
     */
    protected function attachAttributesToProduct(Product $product, array $validData): void
    {
        $attributes = collect($validData['attributes']);
        $attributes->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value'])) {
                return;
            }

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );

            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });
    }
}
