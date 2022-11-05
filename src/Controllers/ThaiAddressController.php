<?php

namespace TopKSTT\ThaiAddress\Controllers;

use TopKSTT\ThaiAddress\Models\District;
use TopKSTT\ThaiAddress\Models\Province;
use TopKSTT\ThaiAddress\Models\PostalCode;
use TopKSTT\ThaiAddress\Models\SubDistrict;
use TopKSTT\ThaiAddress\Resources\DistrictResource;
use TopKSTT\ThaiAddress\Resources\ProvinceResource;
use TopKSTT\ThaiAddress\Resources\PostalCodeResource;
use TopKSTT\ThaiAddress\Resources\SubDistrictResource;
use TopKSTT\ThaiAddress\Resources\ThaiAddressResource;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ThaiAddressController extends Controller
{
    public function getAllSubDistricts(Request $request)
    {
        $query = SubDistrict::query();

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_postal_code) {
            $query->with('postalCode');
        }

        return SubDistrictResource::collection($query->get());
    }

    public function getSubDistrict(Request $request, $id)
    {
        $query = SubDistrict::query();

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_postal_code) {
            $query->with('postalCode');
        }

        return new SubDistrictResource($query->findOrFail($id));
    }

    public function searchSubDistrict(Request $request, $q)
    {
        $query = SubDistrict::query();

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_postal_code) {
            $query->with('postalCode');
        }

        return SubDistrictResource::collection($query->search($q, 'name')->get());
    }

    public function getAllDistricts(Request $request)
    {
        $query = District::query();

        if ($request->with_province) {
            $query->with('province');
        }

        if ($request->with_sub_district) {
            $query->with('subDistricts');
        }

        return DistrictResource::collection($query->get());
    }

    public function getDistrict(Request $request, $id)
    {
        $query = District::query();

        if ($request->with_province) {
            $query->with('province');
        }

        if ($request->with_sub_district) {
            $query->with('subDistricts');
        }

        return new DistrictResource($query->findOrFail($id));
    }

    public function searchDistrict(Request $request, $search)
    {
        $query = District::query();

        if ($request->with_province) {
            $query->with('province');
        }

        if ($request->with_sub_district) {
            $query->with('subDistricts');
        }

        return DistrictResource::collection($query->search($search, 'name')->get());
    }

    public function getAllProvinces(Request $request)
    {
        $query = Province::query();

        if ($request->with_all) {
            $query->with('postalCodes.district');
            $query->with('postalCodes.subDistrict');
        }

        return ProvinceResource::collection($query->get());
    }

    public function getProvince(Request $request, $id)
    {
        $query = Province::query();

        if ($request->with_all) {
            $query->with('postalCodes.district');
            $query->with('postalCodes.subDistrict');
        }

        return new ProvinceResource($query->findOrFail($id));
    }

    public function searchProvince(Request $request, $q)
    {
        $query = Province::query();

        if ($request->with_all) {
            $query->with('postalCodes.district');
            $query->with('postalCodes.subDistrict');
        }

        return ProvinceResource::collection($query->search($q, 'name')->get());
    }

    public function getAllPostalCodes(Request $request)
    {
        $query = PostalCode::query();

        if ($request->with_sub_district) {
            $query->with('subDistrict');
        }

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_province) {
            $query->with('province');
        }

        return PostalCodeResource::collection($query->get());
    }

    public function getPostalCode(Request $request, $id)
    {
        $query = PostalCode::query();

        if ($request->with_sub_district) {
            $query->with('subDistrict');
        }

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_province) {
            $query->with('province');
        }

        return new PostalCodeResource($query->findOrFail($id));
    }

    public function searchPostalCode(Request $request, $q)
    {
        $query = PostalCode::query();

        if ($request->with_sub_district) {
            $query->with('subDistrict');
        }

        if ($request->with_district) {
            $query->with('district');
        }

        if ($request->with_province) {
            $query->with('province');
        }

        return PostalCodeResource::collection($query->search($q, 'code')->get());
    }

    public function search($query)
    {
        return ThaiAddressResource::collection(
            PostalCode::query()
                ->whereHas('subDistrict', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhereHas('district', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhereHas('province', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhere('code', 'like', "%{$query}%")
                ->get()
        );
    }
}
