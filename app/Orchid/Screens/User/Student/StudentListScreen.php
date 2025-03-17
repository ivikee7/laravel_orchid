<?php

namespace App\Orchid\Screens\User\Student;

use App\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class StudentListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'users' => User::with('roles')
                ->with('student')
                ->with('student.promotions')
                ->defaultSort('id', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Student Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->route('platform.school-management-system.student.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('users', [
                TD::make('id')->sort(),
                TD::make('name')->sort(),
                TD::make('role.name')->sort(),
                TD::make('student.id')->sort(),
                TD::make('student.promotions.class')->sort(),
                TD::make('student.name')->sort(),
                TD::make('created_at')->sort(),
                TD::make('created_at')->sort(),
                TD::make('updated_at')->sort(),
            ]),
        ];
    }
}
