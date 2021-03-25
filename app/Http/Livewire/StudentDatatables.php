<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
class StudentDatatables extends LivewireDatatable
{
    public $model = Student::class;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),
  
            Column::name('name')
                ->label('Name'),
  
            DateColumn::name('created_at')
                ->label('Creation Date')
        ];
    }
}
