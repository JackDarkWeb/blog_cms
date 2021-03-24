<?php


namespace App\Repositories\Contracts\BackEnd;


interface ManageGalleryRepositoryContract
{
    /**
     * @param int $page
     * @return mixed
     */
    public function getGalleries($page = 16);

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $imageName
     * @return mixed
     */
    public function create($imageName);

    /**
     * @param $gallery
     * @return mixed
     */
    public function destroy($gallery);

    /**
     * @param $request
     * @param $repository
     * @param string $folderGalleries
     * @return mixed
     */
    public function treatmentMultipleImages($request, $repository, string $folderGalleries);
}
