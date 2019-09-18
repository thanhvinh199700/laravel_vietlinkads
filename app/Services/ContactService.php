<?php

namespace App\Services;

use App\Models\Contact;

class ContactService {
    public function postContact(array $data){
        Contact::create([
                    "contract_fullname" => $data['fullname'],
                    "contract_email" => $data['email'],
                    "contract_phone" => $data['phone'],
                    "contract_tittle" => $data['tittle'],
                    "product_detail" => $data['detail'],
        ]);
    }
    public function getContact(){
        $contact = Contact::all();
        return $contact;
    }
    public function deleteContact($contact){
        $contact->delete();
    }

}
