<?php

namespace Sector7\FilamentKanban\Tests\Pages;

use Sector7\FilamentKanban\Pages\KanbanBoard;
use Sector7\FilamentKanban\Tests\Enums\TaskStatus;
use Sector7\FilamentKanban\Tests\Models\UlidTask;

class TestBoardWithUlidTask extends KanbanBoard
{
    protected static string $model = UlidTask::class;

    protected static string $statusEnum = TaskStatus::class;
}
