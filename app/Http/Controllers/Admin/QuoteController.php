<?php

namespace App\Http\Controllers\Admin;

use App\request_fre_quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function store(Request $request)
    {

        $main = new request_fre_quote();
        $main->fill($request->all());
        $main->save();
        /* for the server
                $recepient = 'vgantyuk2@gmail.com';
                $sitename = "C-Developers.net";

                $name = trim($request["name"]);
                $phone = trim($request["telephone"]);
                $email = trim($request["email"]);
                $skype = trim($request["skype"]);
                $text = trim($request["Requirements"]);

                $pagetitle = "New request free quote from: \"$sitename\"";
                $message = "Name: $name\n E-mail: $email\n Skype: $skype\n Telephone: $phone\n Requitements:\n $text\n";
                mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
        */
    }

    public function quote()
    {
        $request = request_fre_quote::orderBy('created_at')->get();
        return view('admin.Request', compact('request'));
    }

    public function deleted($id)
    {
        request_fre_quote::find($id)->delete();
        return redirect('/admin/quote');
    }

    public function edited(Request $request)
    {
        $requests = request_fre_quote::find($request['id']);
        $requests->name = $request["name"];
        $requests->telephone = $request["telephone"];
        $requests->email = $request["email"];
        $requests->skype = $request["skype"];
        $requests->Requirements = $request["Requirements"];

        $requests->save();

        return redirect('/admin/quote');
    }

    public function searcch(Request $request)
    {
        if ($request->ajax()) {
            $quote = request_fre_quote::where($request->name, 'like', '%' . $request->search . '%')->get();

        $i = 1;
        $apend = '';
        foreach ($quote as $item => $value) {
         $apend .=   "<tr>
                <td >" . $i . "</td >
                <td >" . $value->name . "</td >
                <td >" . $value->email . "</td >
                <td >" . $value->created_at . "</td >
                <td ><a href = \"#edit".$value->id."\" class=\"fancybox\" ><i class=\"fa fa-pencil\"
                                                                    aria - hidden = \"true\" ></i ></a >
                    <a href = \"#viev".$value->id."\" class=\"fancybox\" ><i class=\"fa fa-eye\"
                                                                    aria - hidden = \"true\" ></i ></a >
                    <a href = \"/quote/deleted/".$value->id."\" ><i class=\"fa fa-trash\" aria - hidden = \"true\" ></i ></a >
                </td >
            </tr >";
            $i++;
        }
        return $apend;}

    }
}
