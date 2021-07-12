<?php


namespace App\Http\Controllers\Salaries;


use App\DataTables\SalariesDataTable;
use App\Http\Controllers\Controller;

class SalariesController extends Controller
{
    public function index(SalariesDataTable $dataTable)
    {
        return $dataTable->render('pages.salaries.index');
    }

    public function create()
    {

    }
}
