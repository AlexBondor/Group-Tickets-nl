
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
                Schema::create('group_user', function(Blueprint $table)
                {
                        $table->integer('group_id')
                              ->unsigned()
                              ->index();
                        $table->foreign('group_id')
                              ->references('id')
                              ->on('groups')
                              ->onDelete('cascade');
                        
                        $table->integer('user_id')
                                  ->unsigned()
                                  ->index();
                        $table->foreign('user_id')
                                  ->references('id')
                                  ->on('users')
                                  ->onDelete('cascade');

                        $table->integer('tickets');
                        
                        $table->timestamps();
                });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
                Schema::drop('group_user');
        }

}


