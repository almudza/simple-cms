<?php

namespace Devmus\Policies;

use Devmus\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \Devmus\Model\User\User  $admin
     * @param  \Devmus\Devmus\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function view(Admin $admin)
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
     * @param  \Devmus\Devmus\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->getPermission($admin, 2);
    }

    /**
     * Determine whether the Admin can delete the post.
     *
     * @param  \Devmus\Model\Admin\Admin  $admin
     * @param  \Devmus\Devmus\Model\Admin\Blog\Post  $post
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        return $this->getPermission($admin, 3);
    }


    // User Create
    public function UserCreate(Admin $admin)
    {
        return $this->getPermission($admin, 5);
    }

    // User Update
    public function UserUpdate(Admin $admin)
    {
        return $this->getPermission($admin, 6);
    }

    // User Delete
    public function UserDelete(Admin $admin)
    {
        return $this->getPermission($admin, 7);
    }

    
    /*Tag Policy*/
    public function tag(Admin $admin)
    {
        return $this->getPermission($admin, 9);
    }
    


    /*Category Policy*/
    public function category(Admin $admin)
    {
        return $this->getPermission($admin, 8);
    }

    /*Role Policy*/
    public function role(Admin $admin)
    {
        return $this->getPermission($admin, 10);
    }


    /*Permission Policy*/
    public function permission(Admin $admin)
    {
        return $this->getPermission($admin, 11);
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
