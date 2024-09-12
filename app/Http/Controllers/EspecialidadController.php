<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Especialidad;
use App\Http\Requests\EspecialidadRequest;

class EspecialidadController extends Controller
{
    public function index()
    {
        $item = Especialidad::select(
            'id',
            'Especialidad',
            'Descripcion'
        );

        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-Especialidad" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {

        $item = new Especialidad();
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
        $item = Especialidad::find($request->id);

        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => trans('messages.found')
        );

        return response()->json($data);
    }

    public function store(EspecialidadRequest $request)
    {
        if ($request->id) {
            $item = Especialidad::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new Especialidad();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Usuario;
            $item->CreatorIP = $request->ip();
            $msg = trans('messages.added');
        }
        //return($request);
        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Usuario;
        $item->UpdaterIP = $request->ip();

        $item->Especialidad = $request->Especialidad;
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
        $Especialidad = Especialidad::findOrFail($request->id);
        $Especialidad->deleted_at = Carbon::now();
        $Especialidad->DeleterUserName = Auth::user()->Persona;
        $Especialidad->DeleterFullUserName = Auth::user()->Persona;
        $Especialidad->DeleterIP =  $request->ip();
        $Especialidad->save();
        $msg = trans('messages.deleted');
        $result = array(
            'success' => true,
            'data' => null,
            'msg' => $msg
        );
        return response()->json($result);
    }
}
