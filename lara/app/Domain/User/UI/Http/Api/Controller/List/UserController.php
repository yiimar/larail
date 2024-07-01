<?php

declare(strict_types=1);

namespace App\Domain\User\UI\Http\Api\Controller\List;

use App\Domain\User\Application\Query\List\Fetcher;
use App\Domain\User\Domain\Exception\UserNotLoad;
use App\UI\Http\Api\Controllers\Controller;
use App\UI\Http\Response\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Yiimar
 */
class UserController extends Controller
{
    public function __construct(
        private readonly Fetcher $fetcher
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function __invoke(): JsonResponse | Response
    {
        try {
            $users = $this->fetcher->fetch();
        } catch (UserNotLoad $e) {
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details' => $e->getDetails()
            ], Response::HTTP_NO_CONTENT);
        }

        return new JsonResponse(
            data: $users,
            status: Response::HTTP_OK
        );
    }
}
