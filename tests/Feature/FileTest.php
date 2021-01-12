<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
  
    public function test_file_upload()
    {   
        $file = UploadedFile::fake()->image('test.jpg');
        $this->post('api/trips/1/files', [
            'file' => $file
        ]);
       
        Storage::assertExists('files/' . $file->hashName());
    }
}
