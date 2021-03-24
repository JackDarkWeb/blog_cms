<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\Gallery;
use App\Repositories\Contracts\BackEnd\ManageGalleryRepositoryContract;
use App\Services\Traits\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManageGalleryRepository implements ManageGalleryRepositoryContract
{

    use ImageService;

    /**
     * @param int $page
     * @return Builder[]|Collection|mixed
     */
    public function getGalleries($page = 12)
    {
        return $this->query()->orderBy("id", "DESC")
                             ->paginate($page);

    }

    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->first();
    }

    public function create($imageName)
    {
        return $this->query()->create([
            "user_id" => Auth::id(),
            "url"  => $imageName
        ]);
    }

    /**
     * @param $gallery
     * @return mixed
     */
    public function destroy($gallery)
    {
        File::delete($gallery->url);

        return $gallery->delete();
    }



    protected function query(){

        return Gallery::query();
    }


}
