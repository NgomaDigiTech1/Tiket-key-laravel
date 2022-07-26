<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Repository\App\HomeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct(public HomeRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('app.welcome', [
            'towns' => $this->repository->getTowns(),
            'companies' => $this->repository->getCompanies()
        ]);
    }

    public function contact(): Factory|View|Application
    {
        return view('app.pages.contact.index');
    }

    public function sendContact(Request $request)
    {
        $emails = $request->email;
        $names = $request->full_name;
        $phones = $request->phone;
        $messages = $request->comments;

        $data = [
            'name'=>$names,
            'email'=>$emails,
            'phone'=>$phones,
            'messages'=>$messages
        ];
        Mail::send('mails.contact', $data, function ($message) use ($emails, $names) {
            $message->to($emails, $names)->subject('Message');
            $message->from('institution@vinco.digital', 'Bus TiketKey');
        });

        Mail::send('mails.contact_reception', $data, function ($message) use ($emails, $names) {
            $message->to($emails, $names)->subject('FeedBack Mail Send');
            $message->from('institution@vinco.digital', 'Bus TiketKey');
        });
    }
}
