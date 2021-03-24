<?php


namespace App\Services\Traits;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

trait ImageService
{

    public function treatmentImage($request, string $folderImage){

        $image = $request->file('file');

        $ext = strtolower($image->getClientOriginalExtension());

        $basename =  sha1(time());

        $original   = "{$basename}.{$ext}";

        $image->move($folderImage, $original);

        return  "{$folderImage}/{$original}";
    }

    /**
     * @param $request
     * @param $repository
     * @param string $folderGalleries
     */
    public function treatmentMultipleImages($request, $repository, string $folderGalleries){

        $image = $request->file('file');


        $ext = strtolower($image->getClientOriginalExtension());

        if (!in_array($ext, ['png', 'gif', 'jpeg', 'jpg'])) {

            return response()->json(['success' => false, 'message' => 'Not image'], 400);
        }

        $basename =  sha1(time());

        $original = "{$basename}.{$ext}";

        $full_name_image = "{$folderGalleries}/{$original}";

        $result = $repository->create($full_name_image);

        if ($result){

            $image->move($folderGalleries, $original);
        }

        return $full_name_image;


    }


    /**
     * @param $collect
     * @param $image
     * @return mixed
     */
    public function saveImage($collect, $image){

        return $collect->gallery()->create([
            'name' => $image
        ]);
    }

    /**
     * @param $collect
     * @param $image
     * @return mixed
     */
    public function updateImage($collect, $image){

        return $collect->gallery()->update([
            'name' => $image
        ]);
    }

    /**
     * @param $collect
     * @return mixed
     */
    public function destroyImage($collect){

        File::delete($collect->gallery->name);

        return $collect->gallery()->delete();
    }
}
