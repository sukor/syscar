<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offices".
 *
 * @property string $officeCode
 * @property string $city
 * @property string $phone
 * @property string $addressLine1
 * @property string $addressLine2
 * @property string $state
 * @property string $country
 * @property string $postalCode
 * @property string $territory
 *
 * @property Employees[] $employees
 */
class Offices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['officeCode', 'city', 'phone', 'addressLine1', 'country', 'postalCode', 'territory'], 'required'],
            [['officeCode', 'territory'], 'string', 'max' => 10],
            [['city', 'phone', 'addressLine1', 'addressLine2', 'state', 'country'], 'string', 'max' => 50],
            [['postalCode'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'officeCode' => 'Office Code',
            'city' => 'City',
            'phone' => 'Phone',
            'addressLine1' => 'Address Line1',
            'addressLine2' => 'Address Line2',
            'state' => 'State',
            'country' => 'Country',
            'postalCode' => 'Postal Code',
            'territory' => 'Territory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['officeCode' => 'officeCode']);
    }

    /**
     * @inheritdoc
     * @return OfficesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OfficesQuery(get_called_class());
    }
}
