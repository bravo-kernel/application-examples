<?php
use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('cocktails');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->execute(
            "INSERT INTO `cocktails` VALUES " .
            "('1', 'Cosmopolitan', 'Vodka based', '2015-04-10 15:56:23', null)," .
            "('2', 'Margarita', 'Tequila based', '2015-04-10 15:59:39', null)," .
            "('3', 'Mojito', 'Rum based', '2015-04-11 09:52:01', null)," .
            "('4', 'Cuba Libre', 'Rum based', '2015-04-11 09:52:01', null)," .
            "('5', 'Caipirinha', 'Rum based', '2015-04-11 09:33:37', null)," .
            "('6', 'Tequila Sunrise', 'Tequila based', '2015-04-11 09:52:02', null)," .
            "('7', 'Bloody Mary', 'Vodka based', '2015-04-11 09:52:02', null)," .
            "('8', 'Black Velvet', 'Beer based', '2015-04-11 09:52:02', null)," .
            "('9', 'Martini', 'Gin based', '2015-04-11 09:52:02', null)," .
            "('10', 'Manhattan', 'Whiskey based', '2015-04-11 09:52:03', null)," .
            "('11', 'Bronx', 'Gin based', '2015-04-11 09:52:03', null)," .
            "('12', 'Rose', 'Gin bassed', '2015-04-11 09:52:03', null)," .
            "('13', 'Hot Shot', 'Coffee based', '2015-04-11 09:52:03', null)," .
            "('14', 'Parrot', 'Tequila based', '2015-04-11 09:52:03', null)," .
            "('15', 'Boxer', 'Whiskey based', '2015-04-11 09:52:03', null)," .
            "('16', 'Monkey', 'Cointreau based', '2015-04-11 09:52:03', null)," .
            "('17', 'Pink Panther', 'Cointreau based', '2015-04-11 09:52:03', null)," .
            "('18', 'Zombie', 'Rum based', '2015-04-11 09:52:03', null)," .
            "('19', 'Matador', 'Tequila based', '2015-04-11 09:52:03', null)," .
            "('20', 'B52', 'Cream based', '2015-04-11 09:52:03', null)," .
            "('21', 'Beach Runner', 'Gin based', '2015-04-11 09:52:03', null)"
        );
    }

    public function down()
    {
        $this->dropTable('cocktails');
    }
}
