<?php

namespace App\Http\Controllers\Invoices;

use App\DataTables\Invoices\ReturnPurchasesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\InvoiceReturn;
use App\Models\ReturnItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class ReturnPurchasesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Invoice $purchase)
    {
        $purchase->load(['details.dog', 'details.service']);

        if($purchase->returnInvoice){
            $returnedItems = $purchase->returnInvoice->items->pluck('invoice_detail_id');
            $purchase->load(['details'=>function(HasMany $q) use($returnedItems){
                return $q->whereNotIn('id', $returnedItems);
            },'details.dog', 'details.service']);
        }


        return view('pages.invoices.return_purchases.return_invoice', compact('purchase'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Invoice $purchase, Request $request)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'استرجاع':
                $items = InvoiceDetail::whereIn('id', $request->get('items'))->get();
                break;
            case 'استرجاع كل الفاتورة':
                $items = $purchase->details;
                break;
        }
        //TODO:: Create Or Find Return Invoice
        $returnInvoice = InvoiceReturn::firstOrCreate([
            "invoice_id" => $purchase->id
        ]);
        //TODO::insert Items in Return Invoice
        foreach ($items as $item) {
            $returnInvoice->items()->firstOrCreate([
                'invoice_detail_id' => $item->id
            ]);
        }
//        dd($returnInvoice);
        return redirect(route('invoices.purchases.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
