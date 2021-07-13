<?php


namespace App\Http\Controllers\Salaries;


use App\DataTables\SalariesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    public function index(SalariesDataTable $dataTable)
    {
        return $dataTable->render('pages.salaries.index');
    }

    public function create()
    {
        $usersAlreadyGotPaid = Salary::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->pluck('user_id');
        $empolyees = User::whereNotIn('id', $usersAlreadyGotPaid)->whereIn('type', [1, 3])->with(["ActivitySessions" => function($q){
            $q->whereBetween('created_at', [now()->startOfMonth() , now()->endOfMonth()]);
        }])->get();
        return $empolyees;

        $empolyees = $empolyees->map(function ($empolyee){
            if($empolyee['salary_type'] == 0){
                //session rate * session count
                // This month sessions
                $empolyee['activity_sessions_count'] = $empolyee['activity_sessions']->groupBy('created_at');
                $empolyee['salary'] = $empolyee['salary'] * 10;
            }
            return $empolyee;
        });

        return view('pages.salaries.create', compact('empolyees'));
    }

    public function store(Request $request)
    {
        $from = now()->startOfMonth();
        $to = now()->endOfMonth();
        $userAlreadyGotPaid = Salary::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->where('user_id', $request->get('user_id'))->exists();

        if ($userAlreadyGotPaid)
            return back()->withErrors(['user_id' => __('user already got paid for this month')]);

        Salary::create([
            'from' => $from,
            'to' => $to,
            'user_id' => $request->get('user_id'),
            'amount' => $request->get('amount'),
        ]);

        return redirect(route('salaries.index'));
    }

    public function destroy(Salary $salary)
    {
        return $salary->delete();
    }
}
