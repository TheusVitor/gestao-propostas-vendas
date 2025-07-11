<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->dateTime('registered_at')->useCurrent();
            $table->dateTime('finalized_at')->nullable();
            $table->string('item', 50);
            $table->decimal('value', 10, 2);
            $table->foreignId('status_id')->constrained('proposal_statuses');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}

