<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function add_table(){
        $tables = []; 
        // dd(count(DB::table("education_tables")->get()));
        for ($i = 1; $i < count(DB::table("employees_tables")->get())+1;$i++){

                $data = DB::table(DB::table("employees_tables")->where("id",'=',$i)->get()[0]->name)->get();
                // dd($data);
                $tables[$i] = $data;

        }
        // dd($data);
        // dd($tables);
        return $tables;
    }
    public function index (Request $request)
    {
        $data = DB::table('employees')
        ->Join('employees_tables', function (JoinClause $join) {
            $join->on('employees.supplement', '=', 'employees_tables.id')
                ->where('employees.type_supplement', '=', 3);
        })->select('employees.*', 'employees_tables.name','employees_tables.teg');
        $data1 = DB::table('employees')
            ->Join('employees', function (JoinClause $join) {
                $join->on('employees.supplement', '=', 'employees_documents.id')
                    ->where('employees.type_supplement', '=', 2);
                    
        })->select('employees.*', 'employees_documents.name','employees_documents.teg', 'employees_documents.path')->union($data);

        $data2 = DB::table('employees')
            ->Join('employees_texts', function (JoinClause $join) {
                $join->on('employees.supplement', '=', 'employees_texts.id')
                    ->where('employees.type_supplement', '=', 1);
                    
        })->select('employees.*', 'employees_texts.text','employees_texts.teg')->union($data)->orderBy("position","asc")->get();
        // dd($data2);

        return view('employees',['data'=>$data2,'data_table' => $this->add_table()]);
    }
}
