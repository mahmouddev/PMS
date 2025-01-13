<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return __('Patients');
    }

    public static function getBreadcrumb(): string
    {
        return __('Patients');
    }

    public static function getModelLabel(): string
    {
        return __('Patients');
    }

    public static function getPluralModelLabel(): string
    {

        return static::getModelLabel();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('date_of_birth')->required(),
                Select::make('gender')->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Other' => 'Other'
                ])->required(),
                Select::make('marital_status')->options([
                    'Single' => 'Single',
                    'Married' => 'Married',
                    'Divorced' => 'Divorced',
                    'Widowed' => 'Widowed'
                ])->required(),
                Select::make('nationality')->options([
                    'India' => 'India',
                    'USA' => 'USA',
                    'Kanada' => 'Kanada',
                ])->required(),

                TextInput::make('occupation')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->required()
                    ->numeric()
                    ->maxLength(10)
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('emergency_contact_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('emergency_contact_phone')
                    ->required()
                    ->numeric()
                    ->maxLength(10)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('DOB')
                    ->searchable(),
                TextColumn::make('nationality')
                    ->searchable(),
                TextColumn::make('marital_status')
                    ->searchable(),
                TextColumn::make('occupation')
                    ->searchable(),
                TextColumn::make('emergency_contact_name')
                    ->searchable(),
                TextColumn::make('emergency_contact_phone')
                    ->searchable(),


            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'cat' => 'Cat',
                        'dog' => 'Dog',
                        'rabbit' => 'Rabbit',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TreatmentsRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}