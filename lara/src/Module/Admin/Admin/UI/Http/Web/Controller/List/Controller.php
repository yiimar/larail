<?php

declare(strict_types=1);

namespace App\Module\Admin\Admin\UI\Http\Web\Controller\List;

use Illuminate\Http\Request;

/**
 * @author Dmitry S
 */
class Controller
{
    public function __construct(
//        private Fetcher $fetcher
    ) {
    }

    public function index(Request $request)//: JsonResponse | Response __invoke
    {
//        var_export('111');exit();
//        $users = User::with(User::RELATION_SKILLS)->get();

        // you can return json if it's an API,
        return response()->json('333'
//            compact('users'),
//            Response::HTTP_OK
        );

        // or you can return a view if it's a fullstack
        // and pass $posts via compact()
//        return view('index', compact('posts'));
//        try {
//            $users = $this->fetcher->fetch();
//        } catch (UserNotLoad $e) {
//            return new JsonResponse([
//                'error' => $e->getMessage(),
//                'details' => $e->getDetails()
//            ], Response::HTTP_NO_CONTENT);
//        }
//        return new JsonResponse(/*$users*/'111', Response::HTTP_OK);
    }
}
