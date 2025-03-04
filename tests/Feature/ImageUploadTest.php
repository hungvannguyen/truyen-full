<?php

namespace Tests\Feature;

use App\Trait\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageUploadTest extends TestCase
{
	use Image;
    /**
     * A basic feature test example.
     */
    public function test_image_upload(): void
    {

		$image = $this->uploadImage(UploadedFile::fake()->image('image.jpg'));

		$exitingImage = Storage::disk('s3')->get($image);
		dd($exitingImage);
		$this->assertNotEmpty($exitingImage);

		$this->assertEquals($image, $exitingImage);
    }
}
