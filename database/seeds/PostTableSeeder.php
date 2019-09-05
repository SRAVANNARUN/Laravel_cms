<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1=Category::create([
            'name'=>'News'
        ]);
        $category2=Category::create([
            'name'=>'Marketing'
        ]);
        $category3=Category::create([
            'name'=>'Partnership'
        ]);

        $post1=Post::create([
            'title'=>'1914 translation by H. Rackham',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id'=>$category1->id,
            'image'=>'posts/1.jpg'
        ]);
        $post2=Post::create([
            'title'=>'What is Lorem Ipsum?',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id'=>$category3->id,
            'image'=>'posts/2.jpg'
        ]);
        $post3=Post::create([
            'title'=>'What is Lorem Ipsum?',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id'=>$category2->id,
            'image'=>'posts/3.png'
        ]);
        $post4=Post::create([
            'title'=>'Why do we use it?',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id'=>$category1->id,
            'image'=>'posts/4.jpg'
        ]);

        $tag1=Tag::create([
            'name'=>'Customer'
        ]);
        $tag2=Tag::create([
            'name'=>'Record'
        ]);
        $tag3=Tag::create([
            'name'=>'Job'
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);
    }
}
