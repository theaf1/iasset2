<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Peripherals;
use App\Models\Storageperipherals;
use App\Models\Servers;
use App\Models\Networkdevices;
use App\Models\NetworkedStorage;
use App\Models\Upses;
use App\Models\room;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('index')->with([
            'searches'=>[
                ['id'=>'1', 'name'=>'Client', 'ui_name'=>'คอมพิวเตอร์'],
                ['id'=>'2', 'name'=>'Display', 'ui_name'=>'จอภาพ'],
                ['id'=>'3', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
                ['id'=>'4', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
                ['id'=>'5', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
                ['id'=>'6', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
                ['id'=>'7', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
                ['id'=>'8', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
                ['id'=>'9', 'name'=>'LooseDisplay', 'ui_name'=>'จอภาพที่ไม่ได้ใช้งานกับคอมพิวเตอร์']
            ],
            'rooms'=>Room::all(),
            'results'=>$this->searchEquipment(request()->search_class,request()->search_column,request()->keyword,request()->per_page), //ส่งคำสำคัญไปค้นหาในฐานข้อมูลด้วย function searchEquipment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
    protected function searchEquipment($class, $column, $keyword, $per_page) //function ทำการค้นหาข้อมูล
    {
        //ถ้า ค่า class และ column เป็น null ให้ตีกลับไปด้วยค่า null
        if (! $class || ! $column){
            return null;
        }
        //กำหนดค่าตัวแปร equipmentsClass
        $equipmentsClass = [
            '',
            '\App\Models\Client',
            '\App\Models\Display',
            '\App\Models\Peripherals',
            '\App\Models\storageperipherals',
            '\App\Models\Servers',
            '\App\Models\NetworkedStorage',
            '\App\Models\Networkdevices',
            '\App\Models\Upses',
            '\App\Models\LooseDisplay',
        ];
        $modelClass = $equipmentsClass[$class]; //
        // if ($class == 2)
        // {
        //     return $modelClass::search($keyword)->paginate($per_page);
        // }
        return $modelClass::search($keyword)
            ->where('location_id', $column)
            ->paginate($per_page)
            ->withQueryString(['search_class'=>$class, 'search_column'=>$column, 'keyword'=>$keyword, 'per_page'=>$per_page]); //ทำการค้นหาข้อมูลและตัดแบ่งหน้า 
    }
    private function validateQuery($data) //ตรวจสอบคำค้นหา
    {
        $rules = [
            'search_class' => 'required',
        ];

        $messages = [
            'search_class.required' => 'require',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
