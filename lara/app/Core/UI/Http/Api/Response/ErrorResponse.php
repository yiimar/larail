<?php

declare(strict_types=1);

namespace App\Core\UI\Http\Api\Response;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResponse extends JsonResource
{
    public function __construct(
        public string $errorCode,
        public string $message,
        public mixed $errors = null,
        mixed $resource = null,
    )
    {
        parent::__construct($resource);
        self::$wrap = '';
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array{error_code: string, message: string, errors?: mixed}
     */
    public function toArray(Request $request): array
    {
        $response = [
            "error_code" => $this->errorCode,
            "message" => $this->message,
        ];

        if ($this->errors !== null) {
            $response['errors'] = $this->errors;
        }

        return $response;
    }
}
