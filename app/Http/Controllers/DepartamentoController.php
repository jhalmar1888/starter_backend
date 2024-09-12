<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Departamento;
use App\Http\Requests\DepartamentoRequest;

class DepartamentoController extends Controller
{
    public function index()
    {
        $item = Departamento::select(
            'id',
            'Comisiones',
            'Descripcion'
        );

        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-Departamento" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {

        $item = new Departamento();
        $objeto = null;

        $objeto = $item->orderBy('id', 'asc')->whereNull('deleted_at')->get();

        $data = array(
            'success' => true,
            'data' => $objeto,
            'msg' => trans('messages.listed')
        );

        return response()->json($data);
    }

    public function show(Request $request)
    {
        $item = Departamento::find($request->id);

        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => trans('messages.found')
        );

        return response()->json($data);
    }

    public function store(DepartamentoRequest $request)
    {
        if ($request->id) {
            $item = Departamento::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new Departamento();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Usuario;
            $item->CreatorIP = $request->ip();
            $msg = trans('messages.added');
        }
        //return($request);
        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Usuario;
        $item->UpdaterIP = $request->ip();

        $item->Departamento = $request->Departamento;
        $item->Descripcion = $request->Descripcion;
        
        $item->save();
        // dd($item);
        $result = array(
            'success' => true,
            'data' => $item,
            'msg' => $msg
        );
        return response()->json($result);
    }

    public function destroy(Request $request)
    {
        $departamento = Departamento::findOrFail($request->id);
        $departamento->deleted_at = Carbon::now();
        $departamento->DeleterUserName = Auth::user()->Persona;
        $departamento->DeleterFullUserName = Auth::user()->Persona;
        $departamento->DeleterIP =  $request->ip();
        $departamento->save();
        $msg = trans('messages.deleted');
        $result = array(
            'success' => true,
            'data' => null,
            'msg' => $msg
        );
        return response()->json($result);
    }
}
