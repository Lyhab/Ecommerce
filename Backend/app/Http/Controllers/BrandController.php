<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    public function getAll()
    {
        try {

            $brands = Brand::all();

            return response()->json($brands, Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    public function getById(string $id)
    {
        try {

            $brand = Brand::find($id);
            if(!$brand){
                return response()->json(['message' => 'Brand not found!'], Response::HTTP_NOT_FOUND);
            }

            return response()->json($brand, Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    public function create(Request $request)
    {
        try {

            $data = $request->validate([
                'name' => 'required|min:3',
                'description' => 'nullable|min:3'
            ]);

            Brand::create($data);

            return response()->json( ['message' => 'Created successfully'],Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    public function update(Request $request, string $id)
    {
        try {

            $data = $request->validate([
                'name' => 'nullable|min:3',
                'description' => 'nullable|min:3'
            ]);

            $brand = Brand::find($id);
            if(!$brand){
                return response()->json(['message' => 'Brand not found!'], Response::HTTP_NOT_FOUND);
            }

            $brand->update($data);

            return response()->json( ['message' => 'Updated successfully'],Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    public function delete(string $id)
    {
        try {

            $brand = Brand::find($id);
            if(!$brand){
                return response()->json(['message' => 'Brand not found!'], Response::HTTP_NOT_FOUND);
            }

            $brand->delete();

            return response()->json( ['message' => 'Deleted successfully'],Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    //::::::::::::::::>> Start helper
    protected function handleValidationException(ValidationException $e)
    {
        return response()->json([
            'message' => 'Validation Error',
            'errors' => $e->errors(),
        ], Response::HTTP_BAD_REQUEST);
    }

    protected function handleUnexpectedException(\Exception $e)
    {
        return response()->json([
            'message' => 'Server Error',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    //::::::::::::::::>> Start helper
}
