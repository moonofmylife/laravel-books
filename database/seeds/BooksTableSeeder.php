<?php

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BooksTableSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $jsonFile;

    public function __construct()
    {
        $this->jsonFile = database_path('json/books.json');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists($this->jsonFile)) {
            $data = json_decode(file_get_contents($this->jsonFile));

            foreach ($data as $obj) {
                $book = Book::make(Arr::only((array)$obj, [
                    'name', 'author',
                    'description', 'pages',
                    'age_limit', 'year'
                ]));

                if ($contents = file_get_contents($obj->cover)) {
                    $info = pathinfo($obj->cover);
                    $hash = md5($info['basename']);
                    $path = "covers/{$hash}.{$info['extension']}";

                    if ($book->cover = Storage::put($path, $contents)) {
                        $book->cover = $path;
                    }
                }

                $book->cost = rand(10, 50);
                $book->save();
            }
        }
    }
}
