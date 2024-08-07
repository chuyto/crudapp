<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::query();

        // Maneja el filtro de búsqueda
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Maneja el filtro de rango de precios
        if ($request->has('min_price') && is_numeric($request->input('min_price'))) {
            $minPrice = $request->input('min_price');
            $query->where('price', '>=', $minPrice);
        }

        if ($request->has('max_price') && is_numeric($request->input('max_price'))) {
            $maxPrice = $request->input('max_price');
            $query->where('price', '<=', $maxPrice);
        }

        // Pagina los productos
        $productos = $query->paginate(10); // Ajusta el número de elementos por página según tus necesidades

        return view('productos.index', compact('productos'));
    }




    public function search(Request $request)
    {
        $query = Producto::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
        }

        $productos = $query->get();

        return response()->json($productos);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|string|max:255|unique:productos',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = basename($imagePath); // Almacena solo el nombre del archivo
        }

        Producto::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|string|max:255|unique:productos,sku,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $producto = Producto::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($producto->image) {
                Storage::disk('public')->delete('images/' . $producto->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = basename($imagePath);
        }

        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->image) {
            Storage::disk('public')->delete('images/' . $producto->image);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
