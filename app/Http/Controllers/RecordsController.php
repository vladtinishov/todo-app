<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;

class RecordsController extends Controller
{
    public function index (){
        return view('welcome');
    }

    public function getPageCount ()
    {
        return Records::count();
    }

    public function getAll ()
    {
        return Records::orderBy('num')->get();
    }

    public function upPosition ($rec_1_id) 
    {
        $rec_1 = Records::where('id', $rec_1_id)->first();
        // if($rec_1->num < Records::count()){
        $rec_2 = Records::where('num', '>', $rec_1->num)->orderBy('num')->first();
        if(gettype($rec_2) == 'object'){
            $rec_2_num = $rec_2->num;
            $rec_2->num = $rec_1->num;
            $rec_2->save();

            $rec_1->num = $rec_2_num;
            $rec_1->save();

            return Records::orderBy('num')->get();
        } else{
            return Records::orderBy('num')->get();
        }
    }

    public function downPosition ($rec_1_id) 
    {
        if(Records::count() != 0){
            $rec_1 = Records::where('id', $rec_1_id)->first();
            $rec_2 = 0;
            if($rec_1->num != 1){
                $rec_2 = Records::where('num', '<', $rec_1->num)->orderBy('num', 'desc')->first();

                $rec_2_num = $rec_2->num;
                $rec_2->num = $rec_1->num;
                $rec_2->save();

                $rec_1->num = $rec_2_num;
                $rec_1->save();

                return Records::orderBy('num')->get();
            } else{
                return Records::orderBy('num')->get();
            }
        }
    }

    public function setRecords (Request $request)
    {
        $num = 1;
        if(Records::count() > 0){ 
            $num = Records::latest('id')->first();
            $num = $num->num+1;
        } 
        $rec = new Records;
        $rec->title = $request->title;
        $rec->content = $request->content;

        $rec->save();
    }

    public function deleteRecord ($rec_id)
    {
        Records::where('id', $rec_id)->delete();
    }

    public function getSingle ($rec_id)
    {
        $todo = Records::where('id', $rec_id)->first();
        return $todo;
    }
}