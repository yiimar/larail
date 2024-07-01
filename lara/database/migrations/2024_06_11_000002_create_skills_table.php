<?php

declare(strict_types=1);

namespace Infrastructure\database\migrations;

use App\Domain\Skill\Domain\Entity\Skill;
use App\Domain\Skill\Domain\Entity\SkillUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Skill::TABLE_NAME, static function (Blueprint $table) {
            $table->id(Skill::ATTR_ID);
            $table->string(Skill::ATTR_NAME);
        });

        Schema::create(SkillUser::TABLE_NAME, static function (Blueprint $table) {
            $table->foreignUlid(SkillUser::ATTR_USER_ID)->constrained();
            $table->foreignId(SkillUser::ATTR_SKILL_ID)->constrained();
            $table->primary([SkillUser::ATTR_USER_ID, SkillUser::ATTR_SKILL_ID]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(SkillUser::TABLE_NAME);
        Schema::dropIfExists(Skill::TABLE_NAME);
    }
};
