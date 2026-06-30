<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {

            if (!Schema::hasColumn('transactions', 'order_id')) {
                $table->string('order_id')->unique()->after('event_id');
            }

            if (!Schema::hasColumn('transactions', 'customer_name')) {
                $table->string('customer_name')->after('order_id');
            }

            if (!Schema::hasColumn('transactions', 'customer_email')) {
                $table->string('customer_email')->after('customer_name');
            }

            if (!Schema::hasColumn('transactions', 'customer_phone')) {
                $table->string('customer_phone')->after('customer_email');
            }

            if (!Schema::hasColumn('transactions', 'status')) {
                $table->string('status')->default('Pending')->after('total_price');
            }

            if (!Schema::hasColumn('transactions', 'snap_token')) {
                $table->text('snap_token')->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'order_id',
                'customer_name',
                'customer_email',
                'customer_phone',
                'status',
                'snap_token'
            ]);
        });
    }
};