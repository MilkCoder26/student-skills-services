<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\ServiceResource; // Assuming you meant StudentResource instead of ProductResource

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();

        if($services->count() > 0) {
            return ServiceResource::collection($services);
        }
        else {
            return response()->json([
                'message' => 'No record available',
            ], 200);
        }
    }

    public function store(Request $request)
    {
        // Logic to create a new service
    }

    public function show($id)
    {
        // Logic to retrieve and return a specific service by ID
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing service
    }

    public function destroy($id)
    {
        // Logic to delete a service
    }
}