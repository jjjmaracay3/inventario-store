<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subcategorias;

/**
 * subcategoriasSearch represents the model behind the search form of `app\models\Subcategorias`.
 */
class subcategoriasSearch extends Subcategorias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subcategoria', 'id_categoria', 'id_usuario'], 'integer'],
            [['nombre', 'fechareg'], 'safe'],
            [['estatus'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Subcategorias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_subcategoria' => $this->id_subcategoria,
            'id_categoria' => $this->id_categoria,
            'id_usuario' => $this->id_usuario,
            'fechareg' => $this->fechareg,
            'estatus' => $this->estatus,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}