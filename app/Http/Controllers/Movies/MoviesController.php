<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
    public function index() {

        return view('movies.index', ['movies' => Movie::all()]);
    }

    public function show(Movie $movie) {
        $user = Auth::user() ?? null;

        if ($user) {
            $rented_at = ($movie->users->find($user->id)) ? Carbon::parse($movie->users->find($user->id)->pivot->rented_at) : null;
            if ($rented_at) {
                $data['rented_at'] = $rented_at->format("Y/m/d");
                $data['rented_left_days'] = config('app.rentDaysPeriod') - $rented_at->diffInDays(Carbon::now());
            }
        }
        $data ['movie'] = $movie;
        return view('movies.show', $data);
    }

    public function rent(Movie $movie) {
        $rentReq = $movie->attachUser(Auth::user());
        if (!$rentReq['success']) {
            return redirect()->route('movies.show', ['movie' => $movie])->with('error', $rentReq['msg']);
        }

        return redirect()->route('movies.show', ['movie' => $movie])->with('success', 'The movie has been rented successfully !');
    }
}
