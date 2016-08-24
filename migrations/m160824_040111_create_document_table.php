<?php

use yii\db\Migration;

/**
 * Handles the creation for table `document`.
 */
class m160824_040111_create_document_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('document', [
            'doc_id' => $this->primaryKey(),
            'name' => $this->string(100),
            'path' => $this->text(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('document');
    }
}
