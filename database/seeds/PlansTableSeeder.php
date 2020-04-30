<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        DB::table('plans')->delete();
        $plans = array(
            array(
                'id' => 1, 
                'plan_name' => 'Supplemented income ', 
                'slogan' => "supplemented_income", 
                'description' => "enjoy guarantee return of 3% each month ",
                "interest_rate"=>"3",
                'icon' => 'news-img1.png',
                'banner'=>null,
                'price'=>'3453',
                'duration'=>'1',
                'time_investment'=>'12',
                'plan_valid_from'=>'2020-02-17',
                'plan_type'=>'1',
                'descritpion'=>'[
                    "guaranteed return of 3% each month.",
                    "you will be able to withdrawal your earnings every month.",
                    "you cant cancel within the first year.",
                    "$10,000 become $13,600 in one year // $300 a month.",
                    "$1200 fees apply to the account of 12 payments of $100 each month",
                    "Limited to new clients."
                    ]',
            ),
            array(
                'id' => 2, 
                'plan_name' => 'Balanced plan', 
                'slogan' => "balanced_plan", 
                'description' => "relish life assuredly", 
                "interest_rate"=>"10",
                'icon' => 'news-img2.png',
                'banner'=>'',
                'price'=>'34531',
                'duration'=>'2',
                'time_investment'=>'24',
                'plan_valid_from'=>'2020-02-17',
                'plan_type'=>'1',
                'descritpion'=>'[
                    "Guaranteed return of 10% on 24 months",
                    "its a two-year commitment",
                    "you cant cancel within the first year.",
                    "$2,000 will be added to your account our reward for your commitment.",
                    "$100,000 become $112,500 in 2 years.",
                    "$1020 fees apply to the account of 85 payments of $170 each month",
                    "Bonus of $2000 and rewarders Only apply to $50,000+ accounts upon completion"
                    ]',
            ),
            array(
                'id' => 3, 
                'plan_name' => 'Growth plan', 
                'slogan' => "growth_plan ", 
                'description' => "Grow wealth with confidence",
                "interest_rate"=>"25", 
                'icon' => 'news-img3.png',
                'banner'=>'',
                'price'=>'34532',
                'duration'=>'3',
                'time_investment'=>'36',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'1',
                'descritpion'=>'[
                    "Guaranteed return of 25% 36 months",
                    "its a three-year commitment",
                    "you cant cancel within the first year.",
                    "$2,500 will be added to your account our reward for your commitment.",
                    "$100,000 become $127,500 in 3 years.",
                    "$2040 fees apply to the account of 36 payments of $170 each month",
                    "Bonus Only apply to $50,000+ upon completion"
                    ]',
                ),
            array(
                'id' => 4, 
                'plan_name' => 'Wealth plan', 
                'slogan' => "wealth_plan ", 
                'description' => "superb returns over 5 years",
                "interest_rate"=>"50",  
                'icon' => 'news-img4.png',
                'banner'=>'',
                'price'=>'34532',
                'duration'=>'5',
                'time_investment'=>'60',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'1',
                'descritpion'=>'[
                    "guaranteed return 50% on completion. 60months",
                    "you cant cancel on this plan, a commitment of five years",
                    "$5,000 will be added to your account our reward for your commitment.",
                    "minimums of $50000 to start",
                    "$100,000 become $155,000 in 5 years.",
                    "$6000 fees apply to the account of 60 payments of $100 each month",
                    "Bonus Only apply to $50,000+ upon completion"
                    ]',
            ),
            array(
                'id' => 5, 
                'plan_name' => 'Income',
                'slogan' => "Enjoy guarantee return of 3% each month",                
                "interest_rate"=>"",  
                'icon' => 'cash.png',
                'banner'=>'Supplemental_Income.jpg',
                'description' => "enjoy guarantee return of 3% each month ", 
                'price'=>'2',
                'duration'=>'2',
                'time_investment'=>'',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'2',
                'descritpion'=>'[
                    "Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.",
                    "At completion, we will bonus your account with $5,000 as gratitude of doing business with us.",
                    "$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"
                    ]',
            ),
            array(
                'id' => 6,
                'plan_name' => 'Balanced plan', 
                'slogan' => "Relish life assuredly",
                'description' => "enjoy guarantee return of 3% each month ",                
                "interest_rate"=>"",  
                'icon' => 'libra.png',
                'banner'=>'Balanced_Investing.jpg',
                'price'=>'2',
                'duration'=>'2',
                'time_investment'=>'',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'2',
                'descritpion'=>'[
                    "Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.",
                    "At completion, we will bonus your account with $5,000 as gratitude of doing business with us.",
                    "$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"
                    ]',
            ),
            array(
                'id' => 7, 
                'plan_name' => 'Growth plan', 
                'slogan' => "Grow wealth with confidence",
                'description' => "enjoy guarantee return of 3% each month",  
                "interest_rate"=>"",  
                'icon' => 'money.png',
                'banner'=>'Long-Term_Growth.jpeg',
                'price'=>'2',
                'duration'=>'2',
                'time_investment'=>'',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'2',
                'descritpion'=>'[
                    "Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.",
                    "At completion, we will bonus your account with $5,000 as gratitude of doing business with us.",
                    "$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"
                    ]',
            ),
            array(
                'id' => 8, 
                'plan_name' => 'Wealth plan', 
                'slogan' => "Superb returns over 5 years",
                'description' => "enjoy guarantee return of 3% each month ",  
                
                "interest_rate"=>"",  
                'icon' => 'money.png',
                'banner'=>'Long-Term_Growth.jpeg',
                'price'=>'2',
                'duration'=>'2',
                'time_investment'=>'',
                'plan_valid_from'=>'2020-02-18',
                'plan_type'=>'2',
                'descritpion'=>'[
                    "Guaranteed return 150% on completion.","Five-year commitment, you cannot cancel this plan.",
                    "At completion, we will bonus your account with $5,000 as gratitude of doing business with us.",
                    "$50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts"
                    ]',
            ),
        );
        DB::table('plans')->insert($plans);
    }
}