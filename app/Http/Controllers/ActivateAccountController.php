<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Models\ActivationRequestDetails;

class ActivateAccountController extends Controller
{

    public function index()
    {
        $response         = [];
        $response['user'] = session()->get('user');

        return view('pages.activate-account', $response);
    }

    public function submitPaymentDetails(Request $request)
    {
        $this->validate($request, [
            'text_details' => 'required',
        ]);

        $apd              = new ActivationRequestDetails();
        $apd->users_id    = $request->session()->get('user')->id;
        $apd->description = $request->text_details;

        if ($request->has('payment_details_screenshot')) {
            $image    = $request->file('payment_details_screenshot');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/apd/' . $filename));
            $apd->screenshot_url = $filename;
        }

        $apd->save();

        $response          = [];
        $response['email'] = session()->get('user')->email;

        return view('pages.thankyou.activation-payment-details', $response);
    }
}
