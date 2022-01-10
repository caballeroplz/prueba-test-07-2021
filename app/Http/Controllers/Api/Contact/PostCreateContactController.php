<?php

namespace App\Http\Controllers\Api\Contact;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Contact\Application\ContactCreator;
use App\Http\Requests\Contact\CreateContactRequest;

class PostCreateContactController extends Controller
{
    /**
     * Create new contact
     *
     * @param \App\Http\Requests\Contact\CreateContactRequest $request
     */

    public function __invoke(CreateContactRequest $request, ContactCreator $service)
    {

        DB::beginTransaction();
        try {
                
            $contact = $service->handle(
                $request->ownerid,
                $request->value, 
                $request->type
            );
            DB::commit();
            return response($contact, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }
    }
}
