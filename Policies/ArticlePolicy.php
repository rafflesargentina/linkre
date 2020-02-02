<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Models\Article;
use Raffles\Modules\Linkre\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  User    $user
     * @param  Article $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-article');
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  User    $user
     * @param  Article $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        if ($article->user_id === $user->id) {
            return true;
        }

        return $user->can('update-article');
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  User    $user
     * @param  Article $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        if ($article->user_id === $user->id) {
            return true;
        }

        return $user->can('delete-article');
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  User    $user
     * @param  Article $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        if ($article->user_id === $user->id) {
            return true;
        }

        return $user->can('restore-article');
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  User    $user
     * @param  Article $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        return $this->delete($user, $article);
    }
}
