<?php


namespace App\Repositories\Contracts\BackEnd;


interface ManagePostRepositoryContract
{
    /**
     * @param int $page
     * @return mixed
     */
    public function getPosts($page = 5);

    /**
     * @param int $take
     * @return mixed
     */
    public function getByLimit($take = 3);

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
     * @param $post
     * @return mixed
     */
    public function destroy($post);

    /**
     * @param $data
     * @param $post
     * @return mixed
     */
    public function update($data, $post);

    /**
     * @param $request
     * @param string $folderImage
     * @return mixed
     */
    public function treatmentImage($request, string $folderImage);
}
