<?php


namespace App\Repositories\Contracts\BackEnd;


interface ManageCategoryRepositoryContract
{

    /**
     * @param int $page
     * @return mixed
     */
    public function getCategories($page = 5);

    /**
     * @param int $take
     * @return mixed
     */
    public function getByLimit($take = 3);

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
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $category
     * @return mixed
     */
    public function destroy($category);

    /**
     * @param $data
     * @param $category
     * @return mixed
     */
    public function update($data, $category);

    /**
     * @param $request
     * @param string $folderImage
     * @return mixed
     */
    public function treatmentImage($request, string $folderImage);
}
