<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Yajra\DataTables\DataTables;

class DataController extends Controller
{
    public function categories()
    {
        $category = Category::orderBy('nama_kategori', 'ASC');
        return datatables()->of($category)
            ->addColumn('action','admin.category.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }
}
