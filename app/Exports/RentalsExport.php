<?php

namespace App\Exports;

use App\Rental;
use Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RentalsExport implements FromView
{
    public function view(): View
    {
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            return view('backend.rental.export', [
                'rentals' => Rental::all()
            ]);
        }
        else
        {
            return view('backend.rental.export', [
                'rentals' => Rental::where('staff_id', $staff)->get()
            ]);
        }
    }
}