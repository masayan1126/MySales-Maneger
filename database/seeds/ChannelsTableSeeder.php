<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            [
              'sales_channel' => 'ECサイト',
              'channel_url' => 'https://smartphonecaseshop.net/shop/',
            ],
            [
              'sales_channel' => 'Instagram',
              'channel_url' => 'https://www.instagram.com/masaya_nishigaki/',
            ],
            [
              'sales_channel' => 'Twitter',
              'channel_url' => 'https://twitter.com/TAILLERiPhone1',
            ],
            [
              'sales_channel' => 'メルカリ',
              'channel_url' => 'https://www.mercari.com/jp/u/852073917/',
            ],
            [
              'sales_channel' => 'その他',
              'channel_url' => 'なし',
            ],
            
          ]);
    }
}
