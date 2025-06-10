<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->constrained('proposals');
            $table->foreignId('user_id')->constrained();
            $table->string('action', 20);
            $table->foreignId('status_id')->constrained('proposal_statuses')->onDelete('cascade');
            $table->text('notes');
            $table->dateTime('logged_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposal_logs');
    }
}

