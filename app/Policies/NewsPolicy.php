<?php

namespace App\Policies;

use App\User;
use App\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any news.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the news.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function view(User $user, News $news)
    {
     if ($news->published) {
        return true;
    }

        // visitors cannot view unpublished items
    if ($user === null) {
        return false;
    }

        // admin overrides published status
    if ($user->can('view unpublished posts')) {
        return true;
    }

        // authors can view their own unpublished posts
    return $user->id == $news->user_id;
}

    /**
     * Determine whether the user can create news.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
        /*if ($user->can('create news')) {
            return true;
        }*/
    }

    /**
     * Determine whether the user can update the news.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function update(User $user, News $news)
    {
         if ($user->can('edit own news')) {
            return $user->id == $news->user_id;
        }

        if ($user->can('edit all news')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the news.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function delete(User $user, News $news)
    {
           if ($user->can('delete own news')) {
            return $user->id == $news->user_id;
        }

        if ($user->can('delete any news')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the news.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function restore(User $user, News $news)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the news.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function forceDelete(User $user, News $news)
    {
        //
    }
}
