<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::paginate(24);
        return response()->json($products);
    }

    public function indexByCategory($categoryName)
    {
        // Encuentra la categoría por su nombre
        $category = Categories::where('name', $categoryName)->first();
    
        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }
    
        
        $products = $category->products()->paginate(24);
    
        // Devuelve los productos 
        return response()->json($products);
    }

    public function search(Request $request){
        // Validar si la variable de búsqueda existe en la solicitud
        $request->validate([
            'variable' => 'required|string',
        ]);

    
        $variable = $request->input('variable');

        // Realizar la búsqueda de productos que cumplan con la variable
        $products = Products::where('name', 'like', "%$variable%")
                            ->orWhere('description', 'like', "%$variable%")
                            ->paginate(24);

        // Devolver los productos encontrados 
        return response()->json($products);
    }

}