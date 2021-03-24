<?php


namespace App\Repositories\Contracts\BackEnd;


interface ManagePageRepositoryContract
{
    /**
     * @param int $limit
     * @return mixed
     */
    public function getByLimit($limit = 3);

    /**
     * @param int $page
     * @return mixed
     */
    public function getPages($page = 5);



    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);


    /**
     * @param $request
     * @param $image
     * @return mixed
     */
    public function create($request, $image);

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function createTranslate($request, $collect);

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function updateTranslate($request, $collect);


    /**
     * @param $page
     * @return mixed
     */
    public function destroy($page);

    /**
     * @param $data
     * @param $page
     * @return mixed
     */
    public function update($data, $page);

    /**
     * @param $request
     * @param string $folderImage
     * @return mixed
     */
    public function treatmentImage($request, string $folderImage);
}
