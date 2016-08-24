<?php

use yii\db\Migration;

/**
 * Handles the creation for table `post1`.
 */
class m160824_032523_create_post1_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post1', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post1');
    }
}
