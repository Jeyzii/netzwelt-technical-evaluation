<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $url = 'https://netzwelt-devtest.azurewebsites.net/Territories/All';
        $data = Http::get($url)->json();

        $hierarchicalData = $this->organizeData($data['data']);

        return view('index', ['hierarchicalData' => $hierarchicalData]);
    }

    private function organizeData($data)
    {
        $hierarchicalData = [];

        foreach ($data as $item) {
            $parentId = $item['parent'];
            $itemId = $item['id'];

            if (!isset($hierarchicalData[$parentId])) {
                $hierarchicalData[$parentId] = [];
            }

            $hierarchicalData[$parentId][$itemId] = $item;
        }

        return $hierarchicalData;
    }
}
