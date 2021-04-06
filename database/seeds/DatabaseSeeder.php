<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Admin_table_seeder::class,
            Category_Fake_Table_Seeder::class,
            Sub_Category_Fake_Table_Seeder::class,
            Sub_Sub_Category_Fake_Table_Seeder::class,
            Product_Fake_Table_Seeder::class,
            Supplier_Fake_Table_Seeder::class,
            Deal_Fake_Table_Seeder::class,
            Brand_Fake_Table_Seeder::class,
            Consumer_Fake_Table_Seeder::class,
            Completed_sale_Fake_Table_Seeder::class,
            Reating_Fake_Table_Seeder::class,
            setting_table_seeder::class,
            About_Us_Table_Seeder::class,
            Contra_Table_Seeder::class,
            How_To_Ship_Table_Seeder::class
            // Discount_Fake_Table_Seeder::class
        ]);
    }
}
