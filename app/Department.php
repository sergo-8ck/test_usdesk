<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Department extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'description'];

    /**
     * Relations with Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'department_users',
            'department_id',
            'user_id'
        );
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Add Department
     *
     * @param $fields
     *
     * @return Department
     */
    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();

        return $post;
    }

    /**
     * Edit Department
     *
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * Remove Department
     *
     * @throws \Exception
     */
    public function remove()
    {
        $this->removeLogo();
        $this->delete();
    }

    /**
     * Remove Logo
     */
    public function removeLogo()
    {
        if($this->logo != null)
        {
            Storage::delete('/public/logo/' . $this->logo);
        }
    }

    /**
     * Upload Logo
     *
     * @param $logo
     */
    public function uploadLogo($logo)
    {
        if($logo == null) { return; }

        $this->removeLogo();
        $filename = str_random(10) . '.' . $logo->extension();
        $logo->storeAs('public/logo', $filename);
        $this->logo = $filename;
        $this->save();
    }

    /**
     * Get Logo
     *
     * @return string
     */
    public function getLogo()
    {
        if($this->logo == null)
        {
            return '/storage/logo/no-image.png';
        }

        return '/storage/logo/' . $this->logo;
    }

    public function setUsers($ids)
    {
        if($ids == null){return;}

        $this->users()->sync($ids);
    }
}
