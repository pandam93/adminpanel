<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
     /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actions()
    {
        $delete_url = route('admin.tasks.destroy', [$this->id]);
        $delete_method = method_field('DELETE');

        $edit_url = route('admin.tasks.edit', [$this->id]);
        $edit_method = method_field('GET');

        $show_url = route('admin.tasks.show', [$this->id]);
        $show_method = method_field('GET');
        $csrf = csrf_field();

        $btnEdit = "<form action='$edit_url' method='POST' class='d-inline'>
                            $csrf
                            $edit_method
                            <button class='btn btn-xs btn-default text-primary mx-1 shadow' title='Edit'>
                                <i class='fa fa-lg fa-fw fa-pen'></i>
                            </button>
                        </form>";
        $btnDelete = "<form action='$delete_url' method='POST' class='d-inline'>
                            $csrf
                            $delete_method
                            <button class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                                <i class='fa fa-lg fa-fw fa-trash'></i>
                            </button>
                        </form>";
        $btnDetails = "<form action='$show_url' method='POST' class='d-inline'>
                            $csrf
                            $show_method
                            <button class='btn btn-xs btn-default text-teal mx-1 shadow' title='Details'>
                                        <i class='fa fa-lg fa-fw fa-eye'></i>
                            </button>
                        </form>";

        return '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>';
    }
}
