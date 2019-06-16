<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\ActivationRequestDetails;
use App\Mail\AccountVerified;
use Illuminate\Support\Facades\Mail;

class ActivateAccountController extends Controller
{

    public function index(Request $request, $id)
    {
        $response         = [];
        $response['user'] = Users::find($id);
        $response['apd']  = ActivationRequestDetails::where('users_id', $id)->get();

        return view('pages.admin.activate-account', $response);
    }

    public function apdRequestAction(Request $request)
    {
        switch ($request->action) {
            case 3:
                Users::where('id', $request->uid)->update([
                    'is_activated' => 1
                ]);
                $user = Users::where('id', $request->uid)->first();
                $this->processReferral($user->id);
                $this->sendEmail($user);
                break;
        }

        ActivationRequestDetails::where('users_id', $request->uid)->where('id', $request->apdid)
            ->update([
                'is_accepted' => $request->action
            ]);

        return redirect('/activation-request/' . $request->uid);
    }

    private function processReferral($uid)
    {
//        if(false) {
//            $source_token = $user->id;
//            $referrer_id = $referrer->id;
//            for($i = 0;$i<5;$i++) {
//                switch ($i) {
//                    case 0:
//                        $transaction = new Transactions();
//                        $transaction->users_id = $referrer_id;
//                        $transaction->value = 40;
//                        $transaction->type_id = Transactions::TYPE_REFERRAL_BONUS_MONEY;
//                        $transaction->status_id = Transactions::STATUS_COMPLETED;
//                        $transaction->source_token = $source_token . ',' . '1st_level';
//                        $transaction->save();
//
//                        $transaction2 = new Transactions();
//                        $transaction2->users_id = $referrer_id;
//                        $transaction2->value = 10;
//                        $transaction2->type_id = Transactions::TYPE_REFERRAL_BONUS_REWARD;
//                        $transaction2->status_id = Transactions::STATUS_COMPLETED;
//                        $transaction2->source_token = $source_token . ',' . '1st_level';
//                        $transaction2->save();
//
//                        $nextRef = Users::where('id', $referrer_id)->get();
//                        if(count($nextRef) > 0) {
//                            $referrer_id = $nextRef[0]->referred_by;
//                        } else {
//                            $referrer_id = null;
//                        }
//                        break;
//                    case 1:
//                        if($referrer_id) {
//                            $transaction = new Transactions();
//                            $transaction->users_id = $referrer_id;
//                            $transaction->value = 10;
//                            $transaction->type_id = Transactions::TYPE_REFERRAL_BONUS_MONEY;
//                            $transaction->status_id = Transactions::STATUS_COMPLETED;
//                            $transaction->source_token = $source_token . ',' . '2nd_level';
//                            $transaction->save();
//
//                            $nextRef = Users::where('id', $referrer_id)->get();
//                            if(count($nextRef) > 0) {
//                                $referrer_id = $nextRef[0]->referred_by;
//                            } else {
//                                $referrer_id = null;
//                            }
//                        }
//                        break;
//                    case 2:
//                        if($referrer_id) {
//                            $transaction = new Transactions();
//                            $transaction->users_id = $referrer_id;
//                            $transaction->value = 5;
//                            $transaction->type_id = Transactions::TYPE_REFERRAL_BONUS_MONEY;
//                            $transaction->status_id = Transactions::STATUS_COMPLETED;
//                            $transaction->source_token = $source_token . ',' . '3rd_level';
//                            $transaction->save();
//
//                            $nextRef = Users::where('id', $referrer_id)->get();
//                            if(count($nextRef) > 0) {
//                                $referrer_id = $nextRef[0]->referred_by;
//                            } else {
//                                $referrer_id = null;
//                            }
//                        }
//                        break;
//                    case 3:
//                    case 4:
//                        if($referrer_id) {
//                            $transaction = new Transactions();
//                            $transaction->users_id = $referrer_id;
//                            $transaction->value = 2.5;
//                            $transaction->type_id = Transactions::TYPE_REFERRAL_BONUS_MONEY;
//                            $transaction->status_id = Transactions::STATUS_COMPLETED;
//                            $transaction->source_token = $source_token . ',' . '4th5th_level';
//                            $transaction->save();
//
//                            $nextRef = Users::where('id', $referrer_id)->get();
//                            if(count($nextRef) > 0) {
//                                $referrer_id = $nextRef[0]->referred_by;
//                            } else {
//                                $referrer_id = null;
//                            }
//                        }
//                        break;
//                }
//
//            }
//
//
//            $user->referred_by = $referrer->id;
//        }
    }


    private function sendEmail($user)
    {
        Mail::to($user->email)->send(new AccountVerified($user));
    }
}
