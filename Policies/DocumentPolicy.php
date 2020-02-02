<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Models\Document;
use Raffles\Modules\Linkre\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the document.
     *
     * @param  User     $user
     * @param  Document $document
     * @return mixed
     */
    public function view(User $user, Document $document)
    { 
        if ($document->documentable->user_id === $user->id) {
            return true;
        }

        return $user->can('view-document');
    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-document');
    }

    /**
     * Determine whether the user can update the document.
     *
     * @param  User     $user
     * @param  Document $document
     * @return mixed
     */
    public function update(User $user, Document $document)
    {
        if ($document->documentable->user_id === $user->id) {
            return true;
        }

        return $user->can('update-document');
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  User     $user
     * @param  Document $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        if ($document->documentable->user_id === $user->id) {
            return true;
        }

        return $user->can('delete-document');
    }

    /**
     * Determine whether the user can restore the document.
     *
     * @param  User     $user
     * @param  Document $document
     * @return mixed
     */
    public function restore(User $user, Document $document)
    {
        if ($document->documentable->user_id === $user->id) {
            return true;
        }

        return $user->can('restore-document');
    }

    /**
     * Determine whether the user can permanently delete the document.
     *
     * @param  User     $user
     * @param  Document $document
     * @return mixed
     */
    public function forceDelete(User $user, Document $document)
    {
        return $this->delete($user, $document);
    }
}
