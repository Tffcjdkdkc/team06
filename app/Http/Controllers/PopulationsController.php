<?php

namespace App\Http\Controllers;



use App\Models\Population;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePopulationRequest;
class PopulationsController extends Controller
{


    public function __construct()

    {
        $this ->middleware('auth',['except'=>'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        


        $populations = Population::all();
        return view('populations.index')->with('populations', $populations);
         //return view('populations.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("populations.create");
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePopulationRequest $request)
    {
        // 驗證表單資料
        $data = $request->only([
        'actual_population_served',
        'date_time' ,
        'executing_unit' ,
        'percentage_of_population_served' ,
        'population_in_served_area' , 
        'remarks' ,
    ]);

    
    $population = Population::create($data);

    return redirect('populations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // 根據 ID 查找對應的單一資料
         $population = Population::findOrFail($id);
    
         // 返回視圖並傳遞單一資料
         return view('populations.show')->with('population', $population);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 根據 ID 查找對應的 Population 資料
        $population = Population::findOrFail($id);

        // 返回編輯頁面，並傳遞該資料
        return view('populations.edit')->with('population', $population);;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePopulationRequest $request, $id)
    {
        // 根據 ID 查找對應的 Population 資料
        $population = Population::findOrFail($id);

        // 驗證表單資料
        $data = $request->only([
        'actual_population_served',
        'date_time',
        'executing_unit',
        'percentage_of_population_served',
        'population_in_served_area',
        'remarks',
    ]);

        // 更新該資料
        $population->update($data);

        // 重定向到資料列表頁面
        return redirect()->route('populations.index')->with('success', '資料更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // 根據 ID 查找指定的 Population 資料
        $population = Population::findOrFail($id);

        // 刪除該資料
        $population->delete();

        // 刪除後重定向到 populations 列表頁面
        return redirect()->route('populations.index');
    }
}
