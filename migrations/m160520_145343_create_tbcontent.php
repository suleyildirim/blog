<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tbcontent`.
 * Has foreign keys to the tables:
 *
 * - `tbtype`
 * - `user`
 */
class m160520_145343_create_tbcontent extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbcontent', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'subject' => $this->string(128)->notNull(),
            'tag' => $this->string(128)->notNull(),
            'content' => $this->string(4000)->notNull(),
            'logo' => $this->string(4000)->notNull(),
            'date' => $this->dateTime()->notNull(),
            'type' => $this->integer()->notNull(),
            'author' => $this->integer()->notNull(),
        ]);

        // creates index for column `type`
        $this->createIndex(
            'idx-tbcontent-type',
            'tbcontent',
            'type'
        );

        // add foreign key for table `tbtype`
        $this->addForeignKey(
            'fk-tbcontent-type',
            'tbcontent',
            'type',
            'tbtype',
            'ID',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            'idx-tbcontent-author',
            'tbcontent',
            'author'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tbcontent-author',
            'tbcontent',
            'author',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `tbtype`
        $this->dropForeignKey(
            'fk-tbcontent-type',
            'tbcontent'
        );

        // drops index for column `type`
        $this->dropIndex(
            'idx-tbcontent-type',
            'tbcontent'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-tbcontent-author',
            'tbcontent'
        );

        // drops index for column `author`
        $this->dropIndex(
            'idx-tbcontent-author',
            'tbcontent'
        );

        $this->dropTable('tbcontent');
    }
}
