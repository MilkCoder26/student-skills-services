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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'category_id' => 'required|exists:categories,id',
            'price_range' => 'nullable|string|max:50',
        ]);

        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'student_id' => $request->student_id,
            'category_id' => $request->category_id,
            'price_range' => $request->price_range,
        ]);

        return response()->json([
            'message' => 'Service created successfully',
            'data' => new ServiceResource($service),
        ], 201);
    }

    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|string',
            'student_id' => 'sometimes|required|exists:students,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'price_range' => 'nullable|string|max:50',
        ]);

        $service->update([
            'title' => $request->title, 
            'description' => $request->description, 
            'price' => $request->price, 
            'student_id' => $request->student_id, 
            'category_id' => $request->category_id, 
            'price_range' => $request->price_range,
        ]);

        return response()->json([
            'message' => 'Service updated successfully',
            'data' => new ServiceResource($service),
        ], 200);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json([
            'message' => 'Service deleted successfully',
        ], 200);
    }
}