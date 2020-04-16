<?php

namespace Armincms\Currency\Policies;
 
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Armincms\Currency\Currency;

class CurrencyPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any foods.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the food.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\Currency\Currency  $food
     * @return mixed
     */
    public function view(User $user, Currency $food)
    {
        return true;
    }

    /**
     * Determine whether the user can create foods.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the food.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\Currency\Currency  $food
     * @return mixed
     */
    public function update(User $user, Currency $food)
    { 
        return true;
    }

    /**
     * Determine whether the user can delete the food.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\Currency\Currency  $food
     * @return mixed
     */
    public function delete(User $user, Currency $food)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the food.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\Currency\Currency  $food
     * @return mixed
     */
    public function restore(User $user, Currency $food)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the food.
     *
     * @param  Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\Currency\Currency  $food
     * @return mixed
     */
    public function forceDelete(User $user, Currency $food)
    {
        return true;
    }
}
