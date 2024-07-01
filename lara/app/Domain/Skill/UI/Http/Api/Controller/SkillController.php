<?php

declare(strict_types=1);

namespace App\Domain\Skill\UI\Http\Api\Controller;

use App\Domain\Skill\Domain\Entity\Skill;
use App\Domain\Skill\Infrastructure\Interfaces\SkillRepositoryInterface;
use App\UI\Http\Api\Controllers\Controller;
use App\UI\Http\Requests\StoreSkillRequest;
use App\UI\Http\Requests\UpdateSkillRequest;
use App\UI\Http\Resources\SkillResource;
use App\UI\Http\Response\ApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function __construct(
        private readonly SkillRepositoryInterface $skillRepositoryInterface
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = $this->skillRepositoryInterface->index();

        return ApiResponse::sendResponse(SkillResource::collection($data), message: '');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request): ?JsonResponse
    {
        $details =[
            'name' => $request->name,
        ];
        DB::beginTransaction();
        try{
            $skill = $this->skillRepositoryInterface->store($details);

            DB::commit();
            return ApiResponse::sendResponse(new SkillResource($skill),'Skill Create Successful',201);

        } catch (Exception $ex) {
            return ApiResponse::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $skill = $this->skillRepositoryInterface->getById($id);

        return ApiResponse::sendResponse(new SkillResource($skill), message: '');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, $id): ?JsonResponse
    {
        $updateDetails =[
            'name' => $request->name,
        ];
        DB::beginTransaction();
        try {
            $skill = $this->skillRepositoryInterface->update($updateDetails,$id);

            DB::commit();
            return ApiResponse::sendResponse('Skill Update Successful', message: '', code: 201);

        } catch(Exception $e) {
            return ApiResponse::rollback($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $this->skillRepositoryInterface->delete($id);

        return ApiResponse::sendResponse('Skill Delete Successful','',204);
    }
}
