<?php

declare(strict_types=1);

namespace App\Domain\Skill\Infrastructure\Interfaces;

interface SkillRepositoryInterface
{
    public function index();
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
