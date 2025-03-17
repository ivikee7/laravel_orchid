<?php

namespace App\Orchid\Resources;

use App\Models\StudentClass;
use App\Models\StudentSection;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;

class StudentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Student::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->title('Student Name')
                ->placeholder('Student name'),
            Input::make('user.email')
                ->title('Email ID')
                ->placeholder('Email ID'),
            Input::make('user.password')
                ->title('Password')
                ->placeholder('Password'),
            // Promotion
            Select::make('promotions.class')
                ->fromModel(StudentClass::class, 'name')
                ->title('Class')
                ->placeholder('Class'),
            Select::make('promotions.section')
                ->fromModel(StudentSection::class, 'name')
                ->title('Section')
                ->placeholder('Section'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'User ID'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
