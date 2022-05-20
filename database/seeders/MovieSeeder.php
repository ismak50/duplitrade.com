<?php

namespace Database\Seeders;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                'name' => 'The Martian',
                'overview' => 'During a manned mission to Mars, Astronaut Mark Watney is presumed dead after a fierce storm and left behind by his crew.
                But Watney has survived and finds himself stranded and alone on the hostile planet.
                With only meager supplies, he must draw upon his ingenuity, wit and spirit to subsist and find a way to signal to Earth that he is alive.',
                'release_date' => Carbon::create(2015, 10, 1)->toDateTimeString(),
                'image_url' => 'https://www.themoviedb.org/t/p/w1280/5BHuvQ6p9kfc091Z8RiFNhCwL4b.jpg',
                'score' => '77',
            ],
            [
                'name' => 'The Shawshank Redemption',
                'overview' => 'Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden.
                During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.',
                'release_date' => Carbon::create(1994, 10, 14)->toDateTimeString(),
                'image_url' => 'https://www.themoviedb.org/t/p/w1280/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
                'score' => '87',
            ],
            [
                'name' => 'The Godfather',
                'overview' => 'Spanning the years 1945 to 1955, a chronicle of the fictional Italian-American Corleone crime family.
                When organized crime family patriarch, Vito Corleone barely survives an attempt on his life,
                his youngest son, Michael steps in to take care of the would-be killers, launching a campaign of bloody revenge.',
                'release_date' => Carbon::create(1987, 03, 3)->toDateTimeString(),
                'image_url' => 'https://www.themoviedb.org/t/p/w1280/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
                'score' => '87',
            ],
            [
                'name' => 'The Green Mile',
                'overview' => "A supernatural tale set on death row in a Southern prison, where gentle giant John Coffey possesses the mysterious power to heal people's ailments.
                When the cell block's head guard, Paul Edgecomb, recognizes Coffey's miraculous gift, he tries desperately to help stave off the condemned man's execution.",
                'release_date' => Carbon::create(1999, 12, 20)->toDateTimeString(),
                'image_url' => 'https://www.themoviedb.org/t/p/w1280/velWPhVMQeQKcxggNEU8YmIo52R.jpg',
                'score' => '85',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
