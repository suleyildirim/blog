<?php

namespace backend\modules\blog\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "tbcontent".
 *
 * @property integer $id
 * @property string $title
 * @property string $subject
 * @property string $tag
 * @property string $content
 * @property string $date
 * @property integer $type
 * @property integer $author
 */
class Tbcontent extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbcontent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'subject', 'tag', 'content', 'type', 'author'], 'required'],
            [['date'], 'safe'],
            [['type', 'author'], 'safe'],
            [['file'],'file'],
            [['title', 'subject', 'tag'], 'string', 'max' => 128],
            [['content','logo'], 'string', 'max' => 4000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subject' => 'Subject',
            'tag' => 'Tag',
            'content' => 'Content',
            'date' => 'Date',
            'type' => 'Category Type',
            'author' => 'Author',
            'file' => 'Logo',
        ];
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(User::className(), ['ID' => 'author']);//bizdeki bir kayıt 1 kayıta denk geliyor ilişkiler
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasOne(Tbtype::className(), ['ID' => 'type']);
    }
}
