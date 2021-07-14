<?php

namespace App\Http\Controllers\Invoices;

use App\DataTables\Invoices\PurchasesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Services\Payments\PaymentsService;
use App\Models\Dog;
use App\Models\Faction;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchasesInvoiceController extends Controller
{
    protected $paymentsService;

    public function __construct(PaymentsService $paymentsService)
    {
        $this->paymentsService = $paymentsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurchasesDataTable $dataTable)
    {
        return $dataTable->render('pages.invoices.purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = User::where('type', 4)->get();
        $factions = Faction::get();

        return view('pages.invoices.purchases.create', compact('suppliers', 'factions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $totalItemsAmount = collect($request->get('items'))->sum('price');
        $afterDiscount = $totalItemsAmount - $request->get('discount');
        $taxAmount = ($request->get('tax') / 100) * $afterDiscount;
        $totalAfterDiscountTax = (int)$afterDiscount + (int)$taxAmount;


        /*
         * 1 => Calculate Invoice
         * 2 => create invoice
         * 3 => create Dogs
         * 4 => create Items for invoice
         * 5 => Create Payment for invoice with paid amount
         * */

        /*
         * Calculate Invoice
         * */


        $transaction = DB::transaction(function () use ($request, $taxAmount, $totalAfterDiscountTax) {

            $invoice = Invoice::create([
                'type' => 0,
                'user_id' => $request->get('supplier')['id'],
                'discount' => $request->get('discount'),
                'tax' => 0,
                'total_amount' => $totalAfterDiscountTax,
            ]);
            foreach ($request->get('items') as $index => $item) {
                $dog = Dog::create([
                    'name' => sprintf('%s-%s-%s-%s-%s',
                        $request->get('supplier')['name'],
                        $item['faction']['name'],
                        $item['gender'],
                        $item['age'],
                        $index
                    ),
                    'age' => $item['age'],
                    'user_id' => null,
                    'faction_id' => $item['faction']['id'],
                    'owned_by' => 0,
                    'status' => 1,
                    'gender' => $item['gender'],
                ]);

                $invoiceItem = $invoice->details()->create([
                    'dog_id' => $dog->id,
                    'service_id' => null,
                    'amount' => $item['price'],
                ]);
            }

            //Create Payments
            $this->paymentsService
                ->user($invoice->user)
                ->createPayments($request->get('paid'), $invoice->total_amount);


            return $invoice;
        }, 1);

        return $transaction;
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
