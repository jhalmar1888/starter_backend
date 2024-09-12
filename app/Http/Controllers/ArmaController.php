<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Arma;
use App\Http\Requests\ArmaRequest;

class ArmaController extends Controller
{
    //
    public function index()
    {
        $item = Arma::select('id', 'Arma', 'Lema', 'Descripcion')->orderBy('Arma', 'asc')->whereNull('deleted_at');

        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-Arma" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {
        $item = new Arma();
        $objeto = null;
        $objeto = $item->whereNull('deleted_at')->get();

        $data = array(
            'success' => true,
            'data' => $objeto,
            'msg' => trans('messages.listed')
        );

        return response()->json($data);
    }

    public function show(Request $request)
    {
        try {
            $item = Arma::findOrFail($request->id);
            $data = array(
                'success' => true,
                'data' => $item,
                'msg' => trans('messages.listed')
            );
        } catch (\Exception $e) {
            $data = array(
                'success' => false,
                'data' => null,
                'msg' => trans('mesagges.error')
            );
        } finally {
            return response()->json($data);
        }
    }

    public function store(ArmaRequest $request)
    {
        if ($request->id) {
            $item = Arma::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new Arma();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Persona;
            $item->CreatorIP = $request->ip();
            $msg = trans('messages.added');
        }

        $item->Arma = $request->Arma;
        $item->Descripcion = $request->Descripcion;
        $item->Lema = $request->Lema;
        $item->Imagen = $request->Imagen;

        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Persona;
        $item->UpdaterIP = $request->ip();
        $item->save();

        $result = array(
            'success' => true,
            'data' => $item,
            'msg' => $msg
        );
        return response()->json($result);
    }

    public function destroy(Request $request)
    {
        $item = Arma::where('id', $request->id)->first();
        $item->deleted_at = Carbon::now();
        $item->DeleterUserName = Auth::user()->Persona;
        $item->DeleterFullUserName = Auth::user()->Persona;
        $item->DeleterIP =  $request->ip();
        $item->save();
        $result = array(
            'success' => true,
            'data' => null,
            'msg' => trans('messages.deleted')
        );

        return response()->json($result);
    }
}
