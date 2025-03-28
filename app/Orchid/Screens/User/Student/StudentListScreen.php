<?php

namespace App\Orchid\Screens\User\Student;

use App\Models\User;
use App\Orchid\Layouts\User\UserFiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
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
            'users' => User::with('student', 'student.promotion', 'roles')
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
                TD::make('id', 'ID')->sort(),
                TD::make('name', 'Name')->sort(),
                TD::make('roles', 'Roles')->render(function ($q) {
                    $roles = '';
                    foreach ($q->roles as $role) {
                        $roles .= $role->name . ', ';
                    }
                    return $roles;
                }),
                TD::make('student.promotion.class.name', 'Class')->sort(),
                TD::make('student.promotion.section.name', 'Section')->sort(),
                TD::make('created_at', 'Created At')
                    ->defaultHidden()
                    ->sort(),
                TD::make('updated_at', 'Updated At')
                    ->defaultHidden()
                    ->sort(),
                TD::make()
                    ->render(fn($user) => Group::make([
                        Link::make('Show')->route('platform.school-management-system.student', $user),
                        Link::make('Edit')->route('platform.school-management-system.student.edit', $user),
                    ])),
            ]),
        ];
    }
}
