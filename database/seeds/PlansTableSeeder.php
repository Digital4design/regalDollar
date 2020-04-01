<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->delete();
        $plans = array(
            array(
                'id' => 1, 
                'plan_name' => 'Starter', 
                'slogan' => "starter", 
                'icon' => 'news-img1.png',
                'banner'=>null,
                'price'=>'3453',
                'duration'=>'1',
                'time_investment'=>'12',
                'plan_valid_from'=>'2020-02-17',
                'plan_type'=>'1',
                'descritpion'=>'["Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.","At completion, we will bonus your account with $5,000 as gratitude of doing business with us.","$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"]',
            ),
            array(
                'id' => 2, 
                'plan_name' => 'Supplemental Income', 
                'slogan' => "supplemental_income", 
                'icon' => 'news-img2.png',
                'banner'=>'',
                'price'=>'34531',
                'duration'=>'2',
                'time_investment'=>'24',
                'plan_valid_from'=>'2020-02-17',
                'plan_type'=>'1',
                'descritpion'=>'["Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.","At completion, we will bonus your account with $5,000 as gratitude of doing business with us.","$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"]',
            ),
            array(
                'id' => 3, 
                'plan_name' => 'Balanced Investing', 
                'slogan' => "balanced_investing", 
                'icon' => 'news-img3.png',
                'banner'=>'',
                'price'=>'34532',
                'duration'=>'3',
                'time_investment'=>'36',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'1',
                'descritpion'=>'["Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.","At completion, we will bonus your account with $5,000 as gratitude of doing business with us.","$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"]',
                ),
            
        );
        DB::table('plans')->insert($plans);
    }
}
