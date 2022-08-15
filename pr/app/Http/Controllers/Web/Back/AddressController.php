<?php

namespace App\Http\Controllers\Web\Back;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function show()
    {
        $address = Address::latest()->get();
        return view('admin.address.show', compact('address'));
    }
}
