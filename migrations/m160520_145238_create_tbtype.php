<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tbtype`.
 */
class m160520_145238_create_tbtype extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbtype', [
            'ID' => $this->primaryKey(),
            'Name' => $this->string(128)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbtype');
    }
}
