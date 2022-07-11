<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Radio;
use App\Models\Song;
use Illuminate\Http\Request;
use Goutte;
use Carbon\Carbon;

class RadioController extends Controller
{
    public function get(Request $request)
    {
        if ($request->has('url')) {
            $url = $request->get('url');
            $radio = Radio::where('radio_url', $url)->first(['id']);

            if (empty($radio)) {
                $radio = Radio::create([
                    'radio_url' => $url
                ]);
            }

            if ($radio->count()) {
                Song::where('radio_id', $radio->id)->whereDate('created_at', Carbon::today())->delete();

                $crawler = Goutte::request('GET', $url);

                $data = [];
                $data = $crawler->filter('.tablelist-schedule tr')->each(function ($node) use ($radio) {
                    return [
                        'radio_id' => $radio->id,
                        'name' => $node->filter('.track_history_item')->text(),
                        'time' => $node->filter('.time--schedule')->text(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                });

                Song::insert($data);
            }
        }
    }
}
