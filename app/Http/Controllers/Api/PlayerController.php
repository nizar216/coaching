<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerResourceCollection;
use App\Models\Player;
use App\Traits\HasImageUpload;
use Faker\Provider\Person;
use Illuminate\Http\Request;

/**
 *
 */
class PlayerController extends Controller
{
    use HasImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attribute = $request->query('attribute');
        $value = $request->query('value');
        if ($attribute) {
            $players = Player::filterByAttribute($attribute, $value)->paginate();
        } else {
            $players = Player::paginate();
        }

        return new PlayerResourceCollection($players);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
//        $validated = $request->validated();
////        $image = $request->file('image');
////        $filename = $validated['name'] . '.' . $image->extension();
////        $image->storePubliclyAs('public/players', $filename);
////        $validated['image'] = $filename;
////        $person = Player::create($validated);
////        return new PlayerResource($person);
        $validatedData = $request->validated();
        $this->handleImageUpload($request, $validatedData);
        $player = Player::create($validatedData);
        return new PlayerResource($player);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player): PlayerResource
    {
        return new PlayerResource($player);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $validated = $request->validated();
        $player->update($validated);
        return new PlayerResource($player);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return response()->noContent();
    }
}
