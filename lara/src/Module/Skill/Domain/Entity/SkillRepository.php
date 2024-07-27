<?php

declare(strict_types=1);

namespace App\Module\Skill\Domain\Entity;

use App\Module\Skill\Infrastructure\Interfaces\SkillRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SkillRepository implements SkillRepositoryInterface
{
    public function index(): Collection
    {
        return Skill::all();
    }

    public function getById($id)
    {
        return Skill::findOrFail($id);
    }

    public function store(array $data)
    {
        return Skill::create($data);
    }

    public function update(array $data,$id)
    {
        return Skill::whereId($id)->update($data);
    }

    public function delete($id): void
    {
        Skill::destroy($id);
    }
}
