<?php

use App\View\Components\Front\term;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("question_body");
            $table->unsignedBigInteger("question_type_id");
            $table->unsignedBigInteger("term_id")->nullable();
            $table->json('answer')->nullable();
            $table->softDeletes();
            $table->timestamps();

          
            $table->foreign('question_type_id')->references('id')->on('question_types')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
