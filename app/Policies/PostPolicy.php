<?php

namespace Devmus\Policies;

use Devmus\Model\Admin\Admin;
// use Devmus\Model\Admin\Blog\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \Devmus\Model\User\User  $admin
     * @param  \Devmus\App\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function view(Admin $admin/*, Post $post*/)
    {
        //
    }

    /**
     * Determine whether the Admin can create posts.
     *
     * @param  \Devmus\Model\Admin\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $this->getPermission($admin, 1);
    }

    /**
     * Determine whether the Admin can update the post.
     *
     * @param  \Devmus\Model\Admin\Admin  $admin
     * @param  \Devmus\App\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function update(Admin $admin/*, Post $post*/)
    {
        return $this->getPermission($admin, 2);
    }

    /**
     * Determine whether the Admin can delete the post.
     *
     * @param  \Devmus\Model\Admin\Admin  $admin
     * @param  \Devmus\App\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function delete(Admin $admin/*, Post $post*/)
    {
        return $this->getPermission($admin, 4);
    }
    
    /*Tag Policy*/
    public function tag(Admin $admin/*, Post $post*/)
    {
        return $this->getPermission($admin, 7);
    }
    


    /*Category Policy*/
    public function category(Admin $admin/*, Post $post*/)
    {
        return $this->getPermission($admin, 8);
    }



    protected function getPermission($admin, $p_id)

    {

        foreach ($admin->roles as $role) {

            foreach ($role->permissions as $permission) {

                if ($permission->id == $p_id) {

                    return true;
                    
                }
                
            }
            
        }

        return false;

    }

}
