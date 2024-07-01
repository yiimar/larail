<?php

declare(strict_types=1);

namespace Tests\Feature\User\List;

use Tests\TestCase;

/**
 * @author Yiimar
 */
class UserListControllerTest extends TestCase
{
    /**
     * @throws \Throwable
     */
    public function test_theUserListController_return_ok_response_adn_array_content(): void
    {
        $response = $this->get('api/users/list');
        $response->assertOk();
        self::assertIsArray($response->original);
    }
}
