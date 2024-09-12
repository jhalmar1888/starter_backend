<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Persona;
use App\Http\Requests\PersonaRequest;
use Illuminate\Support\Str;

class PersonaController extends Controller
{
    //
    public function index()
    {
        $item = Persona::from('Persona as p')
            ->whereNull('p.deleted_at')
            ->select('p.id', 'p.ApellidoPaterno', 'p.ApellidoMaterno', 'p.Nombres', 'p.Persona', 'p.email');


        return Datatables::of($item)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-info btn-xs btn-datatable-Persona" id="' . $p->id . '"><i class="fa fa-bars"></i> ' . 'Detalles' . '</a> &nbsp;';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

    public function list(Request $request)
    {
        $item = new Persona();
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
        $item = Persona::where('id', $request->id)
            ->with(
                'sexo',
                'estadoCivil',
                'fuerza',
                'arma',
                'departamento',
                'grupoSanguineo',
                'grado',
                'reparticion',
                'cargo',
                'especialidad'
            )
            ->first();
        $data = array(
            'success' => true,
            'data' => $item,
            'msg' => trans('messages.listed')
        );

        return response()->json($data);
    }

    public function store(PersonaRequest $request)
    {

        if ($request->id) {
            $item = Persona::findOrFail($request->id);
            $msg = trans('messages.updated');
        } else {
            $item = new Persona();
            $item->CreatorIP = $request->ip();
            $item->CreatorUserName = Auth::user()->email;
            $item->CreatorFullUserName = Auth::user()->Usuario;
            $msg = trans('messages.added');
        }

        $item->Nombres = strtoupper($request->Nombres);
        $item->ApellidoPaterno = strtoupper($request->ApellidoPaterno);
        $item->ApellidoMaterno = strtoupper($request->ApellidoMaterno);
        $item->Persona = strtoupper($request->Nombres) . " " . strtoupper($request->ApellidoPaterno) . " " . strtoupper($request->ApellidoMaterno);
        $item->email = strtolower($request->email);
        $item->Activo = $request->Activo ? true : false;
        $item->Foto = $request->Foto;
        $item->CI = $request->CI;

        $item->Sexo = $request->Sexo;
        $item->EstadoCivil = $request->EstadoCivil;
        $item->GrupoSanguineo = $request->GrupoSanguineo;
        $item->Fuerza = $request->Fuerza;
        $item->Arma = $request->Arma;
        $item->Departamento = $request->Departamento;

        $item->Grado = $request->Grado;
        $item->Reparticion = $request->Reparticion;
        $item->Cargo = $request->Cargo;
        $item->Especialidad = $request->Especialidad;



        if ($request->password) {
            $item->password = bcrypt($request->password);
        }

        $item->UpdaterIP = $request->ip();
        $item->UpdaterUserName = Auth::user()->email;
        $item->UpdaterFullUserName = Auth::user()->Usuario;
        $item->save();

        if ($item->Rol > 5) {
            $item->actualizaInformix();
        }

        $result = array(
            'success' => true,
            'data' => $item,
            'msg' => $msg
        );
        return response()->json($result);
    }

    public function destroy(Request $request)
    {
        $persona = Persona::findOrFail($request->id);
        $persona->deleted_at = Carbon::now();
        $persona->DeleterUserName = Auth::user()->Persona;
        $persona->DeleterFullUserName = Auth::user()->Persona;
        $persona->DeleterIP =  $request->ip();
        $persona->email = $persona->email . '#' . Str::random(5);
        $persona->save();
        $msg = trans('messages.deleted');
        $result = array(
            'success' => true,
            'data' => null,
            'msg' => $msg
        );
        return response()->json($result);
    }

    public function select2(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $items = Persona::where('Persona', 'like', '%' . $term . '%')
            ->limit(50);

        $items = $items->get();

        $formatted_items = [];

        foreach ($items as $item) {
            $formatted_items[] = ['id' => $item->id, 'text' => $item->Persona];
        }
        return response()->json($formatted_items);
    }

    public function changePassword(Request $request)
    {
        $rules = array(
            'new' => 'required|required_with:confirm|same:confirm',
        );
        $this->validate($request, $rules);

        $persona = Persona::find($request->Persona);
        $persona->password = bcrypt($request->confirm);
        $persona->UpdaterIP = $request->ip();
        $persona->UpdaterUserName = Auth::user()->email;
        $persona->UpdaterFullUserName = Auth::user()->Usuario;
        $persona->save();

        $data = array(
            'success' => true,
            'data' => null,
            'msg' => 'Contraseña actualizada correctamente'
        );

        return response()->json($data);
    }
}
