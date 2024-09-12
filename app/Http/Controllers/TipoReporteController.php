<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\TipoReporte;
use App\Models\Sistema;
use App\Http\Requests\TipoReporteRequest;

class TipoReporteController extends Controller
{
    public function index()
    {
        $item = TipoReporte::select(
            'id',
            'Num',
            'TipoReporte',
            'Modulo',
            'Titulo',
            'NombreArchivo',
            'Parametros',
            'Definicion',
            'Origen',
            'Activo'
        );

        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-TipoReporte" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {

        $item = new TipoReporte();
        $objeto = null;

        if ($request->filters) {
            if (array_key_exists('Modulo', $request->filters))
                $item = $item->whereIn('Modulo', $request->filters['Modulo']);
        }

        $objeto = $item->where('Activo', 1)->orderBy('Origen', 'desc')->get();

        $data = array(
            'success' => true,
            'data' => $objeto,
            'msg' => trans('messages.listed')
        );

        return response()->json($data);
    }

    public function show(Request $request)
    {
        $item = TipoReporte::find($request->id);

        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => trans('messages.found')
        );

        return response()->json($data);
    }

    public function store(TipoReporteRequest $request)
    {
        if ($request->id) {
            $item = TipoReporte::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new TipoReporte();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Usuario;
            $item->CreatorIP = $request->ip();
            $msg = trans('messages.added');
        }
        //return($request);
        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Usuario;
        $item->UpdaterIP = $request->ip();

        $item->Num = $request->Num;
        $item->TipoReporte = $request->TipoReporte;
        $item->Modulo = $request->Modulo;
        $item->Titulo = $request->Titulo;
        $item->NombreArchivo = $request->NombreArchivo;
        $item->Parametros = $request->Parametros;
        $item->Definicion = $request->Definicion;
        $item->Origen = $request->Origen;
        $item->Activo = $request->Activo ? true : false;
        $item->save();
        // dd($item);
        $result = array(
            'success' => true,
            'data' => $item,
            'msg' => $msg
        );
        return response()->json($result);
    }

    public function generate(Request $request)
    {
        $item = TipoReporte::findOrFail($request->TipoReporte);
        $parametros = array(
            'idUnidadAcademica' => $request->UnidadAcademica,
            'idAreaFuncional' => $request->AreaFuncional,
            'idPersona' => $request->Persona,
            'desde' => $request->Desde . " 00:00:00",
            'hasta' => $request->Hasta . " 23:59:00",
        );

        $item = $item->generaTipoReporte($parametros);

        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => 'Reporte Generado Correctamente'
        );

        return response()->json($data);
    }
}
