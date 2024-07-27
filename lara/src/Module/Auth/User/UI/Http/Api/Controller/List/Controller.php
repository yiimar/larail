<?php

declare(strict_types=1);

namespace App\Module\Auth\User\UI\Http\Api\Controller\List;

use App\Core\UI\Http\Api\Controllers\Controller as ApiController;
use App\Module\Auth\User\Application\Query\List\Fetcher;
use App\Module\Auth\User\Domain\DomainModel\Exception\UserNotLoad;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * @author Dmitry S
 */
class Controller extends ApiController
{
    public function __construct(
        private readonly Fetcher $fetcher
    ) {
    }

    public function __invoke(): JsonResponse
    {
        try {
            $users = $this->fetcher->fetch();
        } catch (UserNotLoad $e) {
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details' => $e->getDetails()
            ], ResponseAlias::HTTP_NO_CONTENT);
        }
        return new JsonResponse(
            $users,
            ResponseAlias::HTTP_OK
        );
    }
}
