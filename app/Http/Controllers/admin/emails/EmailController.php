<?php

namespace App\Http\Controllers\admin\emails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter\Emailsubs;


class EmailController extends Controller
{
    public function showEmailList(){
        $emails = Emailsubs::all();
        return view('admin.dashboard.emails.index',compact('emails'));
    }

    public function addEmail(Request $r){
        $email = new Emailsubs();
        $email->email = $r->email;
        $email->save();

        return response()->json($email, 200);
    }

    public function deleteEmail($id){
        Emailsubs::find($id)->delete();
        return response()->json(200);
    }
}
