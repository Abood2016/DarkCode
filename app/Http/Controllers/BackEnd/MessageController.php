<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\backEnd\Messages\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Mail\replayContact;
use Illuminate\Support\Facades\Mail;
class MessageController extends Controller
{
    public function index()
    {
    	$messges = Message::paginate(10);
    	return view('back-end.messeges.index',compact('messges'));

    }

    public function destroy($id)
    {
        $messge = Message::FindOrFail($id)->delete();    
       alert()->success('Message Deleted Successfully','Done');

        return redirect()->back();
   

    }

     public function edit($id)
    {
    	$messge = Message::findOrFail($id);
    	return view('back-end.messeges.edit',compact('messge'));
    }


      public function replay(Store $request, $id)
    {
        $message = Message::findOrFail($id);
        Mail::send(new replayContact($message,$request->message));
       alert()->success('replay Send Successfully','Done');

        return redirect()->back();

    }
}
