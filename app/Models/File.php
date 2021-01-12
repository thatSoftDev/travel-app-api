<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'name', 'storage_path'];

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }

    public function store(UploadedFile $file): string 
    {   
        if (!$file->isValid()) {
            throw new ValidationException(response()->json('Error when uploading the file.', 422));
        }
        return $file->store('files');
    }

    public function deleteFromStorage(File $file) 
    {   
        try {
            Storage::delete($file->storage_path);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 404);
        }
    }
}
