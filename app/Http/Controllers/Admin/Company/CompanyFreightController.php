<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyFriegth as model;
use App\Models\Port;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;


class CompanyFreightController extends Controller
{
    public string $folder = 'company.company-freight';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $company)
    {
        $company = Company::findOrFail($company);
        if ($request->ajax()) {
            $data = model::with(['port_of_loading', 'port_of_discharge'])->where('company_id', $company->id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) { 
                        $btn = '<a href="'.route($this->folder.'.show', ['company_freight' => $row, 'company' => $row->company_id]).'" class="edit btn btn-primary btn-sm">View</a>'; 
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.'.$this->folder.'.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company)
    {
        $company = Company::findOrFail($company);
        $ports = Port::all();
        $model = [];
        return view('pages.'.$this->folder.'.create', compact('model', 'company', 'ports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company)
    {
        $company = Company::findOrFail($company);
        $model = new model();
        $this->validate($request, $model->rules());
        $model->loadModel($request->all());
        try {
            $model->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'create', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index', $company)->with($this->get_set_message_crud(true, 'create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company, $id)
    {
        $company = Company::findOrFail($company);
        $model = model::findOrFail($id);
        return view('pages.'.$this->folder.'.show', compact('model', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company, $id)
    {
        $company = Company::findOrFail($company);
        $model = model::findOrFail($id);
        $ports = Port::all();
        return view('pages.'.$this->folder.'.show', compact('model', 'company', 'ports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company, $id)
    {
        $company = Company::findOrFail($company);
        $new_model = new model();
        $this->validate($request, $new_model->rules());

        $model = model::findOrFail($id);
        $model->loadModel($request->all());
        try {
            $model->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'edit', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index', $company)->with($this->get_set_message_crud(true, 'edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company, $id)
    {
        $company = Company::findOrFail($company);
        $model = model::findOrFail($id);
        try {
            $model->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'delete', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index', $company)->with($this->get_set_message_crud(true, 'delete'));
    }
}
