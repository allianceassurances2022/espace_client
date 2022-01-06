<?php

namespace App\Http\Controllers\APIs;


use Illuminate\Http\Request;
use App\MobileImg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class SliderAPI
{

    public function getSliderImg()
    {
        $sql = "SELECT * FROM mobile_image";
        $data = DB::connection('mysql')->select($sql);
        //$data = json_encode($data);
        $size = count($data);
        for ($i = 0; $i < $size; $i++) {
            $data_array[$i] = $data[$i]->url;
        }
        // $data_array =  $data_array->toArray();
        $data_array = json_encode($data_array);
        // print_r($data_array->toArray());
        //  print_r($data[0]->url);
        print_r($data_array);
    }

    public function getSliderImgDetail()
    {
        $data = MobileImg::All();

        $data_array = json_encode($data);
        // print_r($data_array->toArray());
        //  print_r($data[0]->url);
        print_r($data_array);
    }
}
