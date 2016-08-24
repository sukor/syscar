<?php

use yii\db\Migration;

class m160824_034419_add_sample_data_post extends Migration
{
    public function up()
    {
        $this->batchInsert('post',['id','position'],
            [
                [1,1],
                [2,2],
                [3,3]
            ]);
    }

    public function down()
    {
        echo "m160824_034419_add_sample_data_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
