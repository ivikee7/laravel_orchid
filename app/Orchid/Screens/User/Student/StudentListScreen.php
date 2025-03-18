<?php

namespace App\Orchid\Screens\User\Student;

use App\Models\Student;
use App\Models\User;
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
            'users' => Student::with(['user', 'user.roles:name', 'promotion'])
                ->wherehas('user', function ($user) {
                    return $user->wherehas('roles', function ($roles) {
                        return $roles->where('name', 'Student');
                    });
                })
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
                TD::make('user.id', 'ID')->sort(),
                TD::make('user.name', 'Name')->sort(),
                TD::make('user.roles', 'Role')->sort(),
                TD::make('promotion.class.name', 'Class')->sort(),
                TD::make('promotion.section.name', 'Section')->sort(),
                TD::make('user.created_at', 'Created At')
                    ->defaultHidden()
                    ->sort(),
                TD::make('user.updated_at', 'Updated At')
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
