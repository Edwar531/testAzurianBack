<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        $clientes = Cliente::
            where(function ($query) use ($request) {
                if ($request->busqueda && $request->busqueda != 'undefined')
                    $query->where('clientes.razon_social', 'LIKE', '%' . $request->busqueda . '%')->orWhere('clientes.identificacion', $request->busqueda)->orWhere('clientes.nombre_comercial', $request->busqueda);
            })
            ->where('estado', $request->estado)
            ->select('id', 'tipo_ident', 'identificacion', 'nombre_comercial', 'razon_social', 'email', 'telefono', 'ciudad', 'direccion')
            ->orderBy($request->sortId, $request->sortDirection)
            ->paginate($request->pageSize);
        return response()->json(['data' => $clientes]);
    }



    public function store(Request $request)
    {
        $id = $request->id;

        $request->validate([
            "razon_social" => 'required|max:60|unique:clientes,razon_social,' . $id,
            "nombre_comercial" => 'nullable|max:60|unique:clientes,nombre_comercial,' . $id,
            "tipo_ident" => "required|string",
            "identificacion" => "nullable|integer|max:99999999999999999999|unique:clientes,identificacion,". $id,
            "email" => 'nullable|email|max:60|unique:clientes,email,' . $id,
            "telefono" => "nullable|integer|max:9999999999999999",
            "ciudad" => "nullable|string|max:60",
            "direccion" => "nullable|string|max:255",
        ]);


        if ($request->id) {
            $c = Cliente::find($request->id);
            $action = 'actualizados';
        } else {
            $c = new Cliente;
            $action = 'guardados';
        }

        $c->fill($request->all());
        $c->user_id = auth()->user()->id;
        $c->save();

        return response()->json(['message' => 'Los datos han sido ' . $action . ' con éxito.', 'cliente' => $c]);
    }


    public function habilitar($id)
    {
        $c = Cliente::find($id);
        $c->estado = "Habilitado";
        $c->save();

        return response()->json(['message' => 'El elemento ha sido habilitado con éxito.', 'cliente' => $c]);
    }

    public function deshabilitar($id)
    {
        $c = Cliente::find($id);
        $c->estado = "Deshabilitado";
        $c->save();

        return response()->json(['message' => 'El elemento ha sido deshabilitado con éxito.', 'cliente' => $c]);
    }

    public function destroy($id)
    {
        $c = Cliente::find($id);
        $c->delete();

        return response()->json(['message' => 'El elemento ha sido eliminado con éxito.', 'cliente' => $c]);
    }

}