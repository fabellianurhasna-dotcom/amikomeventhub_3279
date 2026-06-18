<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations - SKIPPED because SESSION_DRIVER is now 'file', not 'database'
     */
    public function up(): void
    {
        // Sessions are now stored in storage/framework/sessions
        // This migration is kept for reference only and does nothing
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nothing to reverse
    }
};
