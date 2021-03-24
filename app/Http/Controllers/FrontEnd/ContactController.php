<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use App\Http\Requests\Traits\ContactFormRequest;
use App\Mail\Contact;
use App\Repositories\Contracts\FrontEnd\ContactRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    use ContactFormRequest;

    protected $contactRepository;

    public function __construct(ContactRepositoryContract $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function showContactForm (){

        $contentContact = $this->contactRepository->get();

        return view("frontend.contact",[
            "contentContact" => $contentContact
        ]);
    }

    public function submitContactForm(Request $request){

       $errors = $this->contactValidate($request);

        if (!is_null($errors)){
            return response()->json(['success' => false, 'messages' => $errors], 400);
        }

        Mail::to("admin@tahoo.fr")->send(new Contact($request));

        return response()->json(['success' => true, 'message' => __("Thanks :name, we have received your message. We will get back to you in 24 hours maximum", ['name' => "<strong>{$request->get('name')}</strong>"])], 200);


    }
}
