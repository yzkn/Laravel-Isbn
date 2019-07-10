<?php
// Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $book = new Book;
            $book['onix__RecordReference'] = '999999999999' . $i;
            $book['onix__ProductIdentifier__IDValue'] = '999999999999' . $i;
            $book['onix__DescriptiveDetail__TitleDetail__TitleText'] = 'タイトル' . $i;
            $book['summary__isbn'] = '999999999999' . $i;
            $book['summary__title'] = 'タイトル' . $i;
            $book->save();
        }
    }
}
