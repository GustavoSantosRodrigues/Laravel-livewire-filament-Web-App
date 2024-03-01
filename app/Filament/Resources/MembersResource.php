<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembersResource\Pages;
use App\Filament\Resources\MembersResource\RelationManagers;
use App\Models\Member;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembersResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Membros')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->autofocus()
                            ->placeholder('Nome do membro'),
                        TextInput::make('designation')
                            ->label('Designação')
                            ->required(),
                        TextInput::make('fb_url')
                            ->label('Facebook')
                            ->url()
                            ->placeholder('Link do Facebook'),
                        TextInput::make('tw_url')
                            ->label('Twitter')
                            ->url()
                            ->placeholder('Link do Twitter'),
                        TextInput::make('in_url')
                            ->label('Linkedin')
                            ->url()
                            ->placeholder('Link do Linkedin'),
                        FileUpload::make('image')
                            ->label('Imagem')
                            ->image()
                            ->placeholder('Imagem do membro'),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                '1' => 'Ativo',
                                '0' => 'Inativo',
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome Do Membro'),
                TextColumn::make('designation')
                    ->label('Designação'),
                ImageColumn::make('image')
                    ->label('Imagem')
                    ->width(50)
                    ->height(50)
                    ->circular(),

            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMembers::route('/create'),
            'edit' => Pages\EditMembers::route('/{record}/edit'),
        ];
    }
}
