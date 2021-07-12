<?php
namespace App\Http\Controllers\Invoices;

use App\DataTables\Invoices\SalesDataTable;
use \App\Http\Controllers\Controller;

class SalesInvoiceController extends Controller
{
    public function index(SalesDataTable $dataTable)
    {
            return $dataTable->render('pages.invoices.sales.index');
    }

    public function create()
    {
        return view('pages.invoices.sales.create');
    }

    public function store()
    {

    }
}
