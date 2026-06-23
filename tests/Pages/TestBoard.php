<?php

namespace Sector7\FilamentKanban\Tests\Pages;

use Filament\Forms;
use Sector7\FilamentKanban\Pages\KanbanBoard;
use Sector7\FilamentKanban\Tests\Enums\TaskStatus;
use Sector7\FilamentKanban\Tests\Models\Task;
use Sector7\FilamentKanban\Tests\Models\User;

class TestBoard extends KanbanBoard
{
    protected static string $model = Task::class;

    protected static string $statusEnum = TaskStatus::class;

    protected function getEditModalFormSchema(null | int | string $recordId): array
    {
        return [
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Select::make('team')
                ->relationship('team', 'name')
                ->multiple()
                ->options(User::pluck('name', 'id')),
        ];
    }
}
