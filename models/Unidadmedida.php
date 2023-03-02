<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadmedida".
 *
 * @property int $id_unidadmedida Id autoincremental que referencia a la unidad de medida
 * @property string $unidadmedida Nombre o descriptivo de la unidad de medida
 * @property int $id_usuario Usuario que modifico el registro
 * @property string $fechareg Fecha y hora de Creación del registro
 * @property bool $estatus Estatus habilitado true o desabilitado False
 */
class Unidadmedida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadmedida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unidadmedida', 'id_usuario', 'fechareg'], 'required'],
            [['id_usuario'], 'default', 'value' => null],
            [['id_usuario'], 'integer'],
            [['fechareg'], 'safe'],
            [['estatus'], 'boolean'],
            [['unidadmedida'], 'string', 'max' => 50],
            [['unidadmedida'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unidadmedida' => 'Id Unidadmedida',
            'unidadmedida' => 'Unidadmedida',
            'id_usuario' => 'id_usuario',
            'fechareg' => 'Fechareg',
            'estatus' => 'Estatus',
        ];
    }
}
