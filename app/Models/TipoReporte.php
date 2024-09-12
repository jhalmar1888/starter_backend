<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TipoReporteExport;
//use JasperPHP\JasperPHP;
use JasperPHP\Facades\JasperPHP;

class TipoReporte extends Model
{
    protected $table = 'TipoReporte';
    protected $basePathJRXML;
    protected $basePathGenerated;
    protected $urlFile;
    protected $database;
    use HasFactory;




    public function __construct()
    {
        parent::__construct();
        $this->basePathJRXML = storage_path('jrxml/');
        $this->basePathGenerated = public_path('tmp/');
        $this->urlFile = config('app.url') . 'tmp/';
        $this->database = config('database.connections.pgsql');
        $this->database['driver'] = 'postgres';
    }


    public function generaTipoReporte(array $parametros = [])
    {
        $urlReporte = null;
        switch ($this->Origen) {
            case 'jasper':
                $urlReporte = $this->generaJasper($parametros);
                break;
            case 'excel':
                $urlReporte = $this->generaExcel($parametros);
                break;
            case 'csv':
                $urlReporte = $this->generaCsv($parametros);
                break;
            default:
                $urlReporte = null;
        }
        return $urlReporte;
    }

    public function generaJasper(array $parametros = [])
    {
        $parametrosReporte = $this->Parametros;
        $params = array('urlLogo' => public_path('images/emi_logo.png'));
        //dd($parametros['desde']." ".$parametros['hasta']);
        if (str_contains($parametrosReporte, ':idUnidadAcademica'))
            $params['idUnidadAcademica'] = $parametros['idUnidadAcademica'];
        if (str_contains($parametrosReporte, ':idPersona'))
            $params['idPersona'] = $parametros['idPersona'];
        if (str_contains($parametrosReporte, ':desde'))
            $params['desde'] = date("Y-m-d H:i:s", strtotime($parametros['desde'])); //Carbon::parse($parametros['desde'])->format('Y-m-d H:i:s');
        if (str_contains($parametrosReporte, ':hasta'))
            $params['hasta'] = date("Y-m-d H:i:s", strtotime($parametros['hasta']));; //Carbon::parse($parametros['hasta'])->format('Y-m-d H:i:s');
        //dd($params);
        $fileName = md5($this->NombreArchivo . Carbon::now());
        $basePathJasper = $this->basePathJRXML . $this->Definicion;
        $basePathGenerated = $this->basePathGenerated . $fileName;

        if (Storage::exists($basePathGenerated))
            Storage::delete($basePathGenerated);

        $reporteJasper = JasperPHP::process(
            $basePathJasper,
            $basePathGenerated,
            array("pdf"),
            $params,
            $this->database
        );

        //dd($reporteJasper->output());
        //  return ($reporteJasper->output());
        //dd ($basePathGenerated);
        $reporteJasper->execute();

        return array(
            'url' => $this->urlFile . $fileName . '.pdf',
            'uri' => $this->basePathGenerated . $fileName . '.pdf',
            'fileName' => $fileName . '.pdf'
        );
    }

    public function generaExcel(array $parametros = [])
    {
        $parametrosReporte = $this->Parametros;
        $fileName = md5($this->NombreArchivo . Carbon::now());
        $basePathGenerated = $this->basePathGenerated;

        //Elimina previamente en caso de que el archivo exista
        if (Storage::exists($basePathGenerated . $fileName . '.xlsx'))
            Storage::delete($basePathGenerated);

        $sql = $this->Definicion;
        if (str_contains($parametrosReporte, ':idUnidadAcademica'))
            $sql = str_replace(':idUnidadAcademica', $parametros['idUnidadAcademica'], $sql);
        else
            $sql = str_replace(':idUnidadAcademica', 'null', $sql);

        if (str_contains($parametrosReporte, 'idAreaFuncional'))
            $sql = str_replace(':idAreaFuncional', $parametrosReporte['idAreaFuncional'], $sql);
        else
            $sql = str_replace(':idAreaFuncional', 'null', $sql);

        if (str_contains($parametrosReporte, ':idPersona'))
            $sql = str_replace(':idPersona', $parametros['idPersona'], $sql);
        else
            $sql = str_replace(':idAreaFuncional', 'null', $sql);

        if (str_contains($parametrosReporte, ':desde'))
            $sql = str_replace(':desde', $parametros['desde'], $sql);

        if (str_contains($parametrosReporte, ':hasta'))
            $sql = str_replace(':hasta', $parametros['hasta'], $sql);
        //dd($sql);
        //crea cabeceras del archivo
        $result = DB::select(DB::raw($sql));
        $cabeceras = [];
        $i = 0;
        foreach ($result as $key => $value) {
            foreach ($value as $k => $v) {
                $cabeceras[$i] = $k;
                $i++;
            }
            break;
        }
        //genera el archivo excel
        ob_clean();
        Excel::store(new TipoReporteExport($sql, $cabeceras), $fileName . '.xlsx', 'generated');

        return array(
            'url' => $this->urlFile . $fileName . '.xlsx',
            'uri' => $this->basePathGenerated . $fileName . '.xlsx',
            'fileName' => $fileName . '.xlsx'
        );
    }

    //TODO: implementar generacion de archivos CSV
    public function generaCsv(array $parametros = [])
    {
        return null;
    }
}
