<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // App\User::insert([
        //     'name' => 'blogger',
        //     'email' => 'blogger@gmail.com',
        //     'password' => bcrypt('demodemo'),
        //     'usertype' => 'blogger',
        //     'stripe_id' => 'cus-123'
        // ]);

        // App\User::insert([
        //     'name' => 'reader',
        //     'email' => 'reader@gmail.com',
        //     'password' => bcrypt('demodemo'),
        //     'usertype' => 'reader',
        //     'stripe_id' => 'cus-123'
        // ]);

        App\Article::insert([
            'user_id' => 1,
            'blog_title' => 'My first sport post!',
            'blog_body' => 'Open know age use whom him than lady was. On lasted uneasy exeter my itself effect spirit. At design he vanity at cousin longer looked ye. Design praise me father an favour. As greatly replied it windows of an minuter behaved passage. Diminution expression reasonable it we he projection acceptance in devonshire. Perpetual it described at he applauded. 

            Marianne or husbands if at stronger ye. Considered is as middletons uncommonly. Promotion perfectly ye consisted so. His chatty dining for effect ladies active. Equally journey wishing not several behaved chapter she two sir. Deficient procuring favourite extensive you two. Yet diminution she impossible understood age. 
            
            Affronting imprudence do he he everything. Sex lasted dinner wanted indeed wished out law. Far advanced settling say finished raillery. Offered chiefly farther of my no colonel shyness. Such on help ye some door if in. Laughter proposal laughing any son law consider. Needed except up piqued an. 
            
            Much evil soon high in hope do view. Out may few northward believing attempted. Yet timed being songs marry one defer men our. Although finished blessing do of. Consider speaking me prospect whatever if. Ten nearer rather hunted six parish indeed number. Allowance repulsive sex may contained can set suspected abilities cordially. Do part am he high rest that. So fruit to ready it being views match. ',
            'blog_image' => '',
            'blog_allow_comments' => 1,
            'created_at' => Carbon::create('2019', '06', '06'),
            'updated_at' => Carbon::create('2019', '07', '07')
        ]);
    
        App\Article::insert([
            'user_id' => 1,
            'blog_title' => 'My second food post!',
            'blog_body' => 'Open know age use whom him than lady was. On lasted uneasy exeter my itself effect spirit. At design he vanity at cousin longer looked ye. Design praise me father an favour. As greatly replied it windows of an minuter behaved passage. Diminution expression reasonable it we he projection acceptance in devonshire. Perpetual it described at he applauded. 

            Marianne or husbands if at stronger ye. Considered is as middletons uncommonly. Promotion perfectly ye consisted so. His chatty dining for effect ladies active. Equally journey wishing not several behaved chapter she two sir. Deficient procuring favourite extensive you two. Yet diminution she impossible understood age. 
            
            Affronting imprudence do he he everything. Sex lasted dinner wanted indeed wished out law. Far advanced settling say finished raillery. Offered chiefly farther of my no colonel shyness. Such on help ye some door if in. Laughter proposal laughing any son law consider. Needed except up piqued an. 
            
            Much evil soon high in hope do view. Out may few northward believing attempted. Yet timed being songs marry one defer men our. Although finished blessing do of. Consider speaking me prospect whatever if. Ten nearer rather hunted six parish indeed number. Allowance repulsive sex may contained can set suspected abilities cordially. Do part am he high rest that. So fruit to ready it being views match. ',
            'blog_image' => '',
            'blog_allow_comments' => 1,
            'created_at' => Carbon::create('2019', '06', '06'),
            'updated_at' => Carbon::create('2019', '07', '07')
        ]);
    
        App\Article::insert([
            'user_id' => 1,
            'blog_title' => 'My third leisure post!',
            'blog_body' => 'Open know age use whom him than lady was. On lasted uneasy exeter my itself effect spirit. At design he vanity at cousin longer looked ye. Design praise me father an favour. As greatly replied it windows of an minuter behaved passage. Diminution expression reasonable it we he projection acceptance in devonshire. Perpetual it described at he applauded. 

            Marianne or husbands if at stronger ye. Considered is as middletons uncommonly. Promotion perfectly ye consisted so. His chatty dining for effect ladies active. Equally journey wishing not several behaved chapter she two sir. Deficient procuring favourite extensive you two. Yet diminution she impossible understood age. 
            
            Affronting imprudence do he he everything. Sex lasted dinner wanted indeed wished out law. Far advanced settling say finished raillery. Offered chiefly farther of my no colonel shyness. Such on help ye some door if in. Laughter proposal laughing any son law consider. Needed except up piqued an. 
            
            Much evil soon high in hope do view. Out may few northward believing attempted. Yet timed being songs marry one defer men our. Although finished blessing do of. Consider speaking me prospect whatever if. Ten nearer rather hunted six parish indeed number. Allowance repulsive sex may contained can set suspected abilities cordially. Do part am he high rest that. So fruit to ready it being views match. ',
            'blog_image' => '',
            'blog_allow_comments' => 1,
            'created_at' => Carbon::create('2019', '06', '06'),
            'updated_at' => Carbon::create('2019', '07', '07')
        ]);

        App\Category::insert([
            'title' => 'sport'
        ]);

        App\Category::insert([
            'title' => 'food'
        ]);

        App\Category::insert([
            'title' => 'leisure'
        ]);

        DB::table('article_category')->insert([
            'article_id' => '1',
            'category_id' => '1'
        ]);

        DB::table('article_category')->insert([
            'article_id' => '2',
            'category_id' => '2'
        ]);

        DB::table('article_category')->insert([
            'article_id' => '3',
            'category_id' => '3'
        ]);
    }
}
