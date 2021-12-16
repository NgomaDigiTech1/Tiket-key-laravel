<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Event;
use App\Models\User;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Interfaces\BaseRepositoryInterface
{
    use ImageUploader;

    public function getContents(): Collection|array
    {
        return User::query()
            ->where('role_id', '!=', 2)
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return User::query()
            ->where('role_id', '!=', 2)
            ->where('key', '=', $key)
            ->firstOrFail();
    }

    public function create($attributes): Model|Builder
    {
        $user = User::query()
            ->create([
                'name' => $attributes->input('name'),
                'first_name' => $attributes->input('first_name'),
                'email' => $attributes->input('email'),
                'birthdays' => $attributes->input('birthdays'),
                'phone_number' => $attributes->input('phone_number'),
                'password' => Hash::make($attributes->input('password')),
                'role_id' => $attributes->input('role_id'),
                'picture' => self::uploadFiles($attributes)
            ]);
        toast("Un utilisateur a ete ajouter", 'success');
        return $user;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $user = $this->show($key);
        $this->removeOldImages($user);
        $this->updateUser($user, $attributes);
        toast("L'utilisateur a ete modifier", 'warning');
        return $user;
    }

    public function delete(string $key): Model|Builder
    {
        $user = $this->show($key);
        $this->removeOldImages($user);
        $user->delete();
        toast('L\'utilisateur vient d\'etre suspéndue pour des raisons de securité', 'success');
        return $user;
    }

    private function updateUser($user, $attributes)
    {
        $user->update([
            'name' => $attributes->input('name'),
            'first_name' => $attributes->input('first_name'),
            'email' => $attributes->input('email'),
            'birthdays' => $attributes->input('birthdays'),
            'phone_number' => $attributes->input('phone_number'),
            'password' => Hash::make($attributes->input('password')),
            'role_id' => $attributes->input('role_id'),
            'picture' => self::uploadFiles($attributes)
        ]);
    }

}
