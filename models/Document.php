<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $doc_id
 * @property string $name
 * @property string $path
 * @property integer $status
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $fileuploadx;
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'string'],
             [['fileuploadx'], 'required'],
            [['status'], 'integer'],
           //[['fileuploadx'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => 'Doc ID',
            'name' => 'Name',
            'path' => 'Path',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return DocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DocumentQuery(get_called_class());
    }
}
