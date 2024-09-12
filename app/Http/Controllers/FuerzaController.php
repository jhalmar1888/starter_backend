<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Fuerza;
use App\Http\Requests\FuerzaRequest;

class FuerzaController extends Controller
{
    public function index()
    {
        $item = Fuerza::select(
            'id',
            'Fuerza',
            'Descripcion'
        );

        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-Fuerza" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {

        $item = new Fuerza();
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
        $item = Fuerza::find($request->id);

        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => trans('messages.found')
        );

        return response()->json($data);
    }

    public function store(FuerzaRequest $request)
    {
        if ($request->id) {
            $item = Fuerza::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new Fuerza();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Usuario;
            $item->CreatorIP = $request->ip();
            $msg = trans('messages.added');
        }
        //return($request);
        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Usuario;
        $item->UpdaterIP = $request->ip();

        $item->Fuerza = $request->Fuerza;
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
        $fuerza = Fuerza::findOrFail($request->id);
        $fuerza->deleted_at = Carbon::now();
        $fuerza->DeleterUserName = Auth::user()->Persona;
        $fuerza->DeleterFullUserName = Auth::user()->Persona;
        $fuerza->DeleterIP =  $request->ip();
        $fuerza->save();
        $msg = trans('messages.deleted');
        $result = array(
            'success' => true,
            'data' => null,
            'msg' => $msg
        );
        return response()->json($result);
    }
}
