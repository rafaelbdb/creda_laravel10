<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $categories = Category::all();

        $movements = Movement::where('user_id', $user->id)
            ->leftJoin('categories', 'movements.category_id', '=', 'categories.id')
            ->orderBy('date', 'desc')
            ->get();

        $avgExpenses = Movement::where('user_id', $user->id)
            ->join('categories', 'movements.category_id', '=', 'categories.id')
            ->where('categories.type', 'expense')
            ->avg('amount');

        $avgIncomes = Movement::where('user_id', $user->id)
            ->join('categories', 'movements.category_id', '=', 'categories.id')
            ->where('categories.type', 'income')
            ->avg('amount');

        $totalExpense = Movement::where('user_id', $user->id)
            ->join('categories', 'movements.category_id', '=', 'categories.id')
            ->where('categories.type', 'expense')
            ->sum('amount');

        $totalIncome = Movement::where('user_id', $user->id)
            ->join('categories', 'movements.category_id', '=', 'categories.id')
            ->where('categories.type', 'income')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        return view('dashboard', compact('movements', 'categories', 'avgExpenses', 'balance'));
    }
}
