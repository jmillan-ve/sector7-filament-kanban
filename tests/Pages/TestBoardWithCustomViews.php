<?php

namespace Sector7\FilamentKanban\Tests\Pages;

use Filament\Forms\Components\TextInput;
use Sector7\FilamentKanban\Pages\KanbanBoard;
use Sector7\FilamentKanban\Tests\Enums\TaskStatus;
use Sector7\FilamentKanban\Tests\Models\Task;

class TestBoardWithCustomViews extends KanbanBoard
{
    protected static string $model = Task::class;

    protected static string $statusEnum = TaskStatus::class;

    protected static string $recordView = 'kanban-record';

    protected function getEditModalFormSchema(null | int | string $recordId): array
    {
        return [
            TextInput::make('title'),
        ];
    }
}
