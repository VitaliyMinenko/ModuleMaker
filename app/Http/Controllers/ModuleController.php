<?php

namespace App\Http\Controllers;

use App\Classes\Module;
use App\Dto\ModuleDto;
use App\Http\Requests\ModuleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ModuleController extends Controller
{
    protected Module $module;

    public function __construct(Module $clothesRepository)
    {
        $this->module = $clothesRepository;
    }
    public function generate(ModuleRequest $request): BinaryFileResponse|JsonResponse
    {
        try {
            $module = $request->validated();
            $moduleDto = ModuleDTO::fromArray($module);
            $result = $this->module->generate($moduleDto);
            return response()->download($result)->deleteFileAfterSend(true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['errors' => $errors], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            Log::error((string)$e);
            return response()->json(['error' => 'Something went wrong'], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
