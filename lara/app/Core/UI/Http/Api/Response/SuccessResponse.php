<?php

declare(strict_types=1);

namespace App\Core\UI\Http\Api\Response;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResponse extends JsonResource
{
    public function __construct(
        mixed $resource = null,
        public string $message = 'Successful'
    )
    {
        parent::__construct($resource);
    }

    /**
     * @param $request
     *
     * @return array{message: string}
     */
    public function with($request): array
    {
        return [
            'message' => $this->message,
        ];
    }

    public function toArray(Request $request): array
    {
        if (is_array($this->resource)) {
            return $this->resource;
        }
        if (is_null($this->resource)) {
            return [];
        }

        return [$this->resource];
    }
}
