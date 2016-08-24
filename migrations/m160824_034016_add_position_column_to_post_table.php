<?php

use yii\db\Migration;

/**
 * Handles adding position to table `post`.
 */
class m160824_034016_add_position_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('post', 'position', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('post', 'position');
    }
}
