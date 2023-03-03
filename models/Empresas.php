<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario.empresas".
 *
 * @property int $id_empresa Id autoincremental que referencia el id que identifica la empresa empresa
 * @property string|null $rif
 * @property string $nombre Nombre  de la empresa
 * @property string $direccion Dirección geografica  de la empresa
 * @property string $correo email  de la empresa
 * @property string $telefono1
 * @property string $telefono2
 * @property string $redes todas las redes separadas por un punto y como (;)
 * @property string|null $slogan idea Comercial
 * @property string $logo
 * @property int $id_usuario
 * @property string $fechareg
 * @property bool $estatus
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario.empresas';
    }

    /**
     * {@inheritdoc}
     */

    public $imageFile;

    public function rules()
    {
        return [
            [['nombre', 'direccion', 'correo', 'telefono1', 'telefono2', 'redes', 'logo', 'id_usuario', 'fechareg'], 'required'],
            [['direccion'], 'string'],
            [['id_usuario'], 'default', 'value' => null],
            [['id_usuario'], 'integer'],
            [['fechareg'], 'safe'],
            [['estatus'], 'boolean'],
            [['rif'], 'string', 'max' => 12],
            [['nombre', 'correo', 'redes'], 'string', 'max' => 50],
            [['telefono1', 'telefono2'], 'string', 'max' => 15],
            [['slogan', 'logo'], 'string', 'max' => 100],
            [['nombre'], 'unique'],
            //[['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_usuario' => 'id']],

            return [
              [['logo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            ];
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->logo->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'rif' => 'Rif',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'correo' => 'Correo',
            'telefono1' => 'Telefono1',
            'telefono2' => 'Telefono2',
            'redes' => 'Redes',
            'slogan' => 'Slogan',
            'logo' => 'Logo',
            'id_usuario' => 'Id Usuario',
            'fechareg' => 'Fechareg',
            'estatus' => 'Estatus',
        ];
    }
}
