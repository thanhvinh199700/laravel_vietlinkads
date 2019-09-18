<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Models\Contact;

class ContactController extends Controller {
    
    
    
    protected $contactService;
    public function __construct(ContactService $contactService) {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {      
        $contact = $this->contactService->getContact($request->all());
        return view('contact.index',['contacts'=>$contact]);
    }
    public function delete(Contact $contact){  
        $this->contactService->deleteContact($contact);
        return redirect('contacts')->with('success_message', 'delete contact sucess');
    }

}
