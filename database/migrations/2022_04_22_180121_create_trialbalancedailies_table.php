<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trialbalancedailies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenantid');
            $table->date('transactiondate');
            $table->decimal('mpesa_dr',15,2)->default('0.00');
            $table->decimal('mpesa_cr',15,2)->default('0.00');
            $table->decimal('cash_dr',15,2)->default('0.00');
            $table->decimal('cash_cr',15,2)->default('0.00');
            $table->decimal('bank_dr',15,2)->default('0.00');
            $table->decimal('bank_cr',15,2)->default('0.00');
            $table->decimal('loans_dr',15,2)->default('0.00');
            $table->decimal('loans_cr',15,2)->default('0.00');
            $table->decimal('borrowings_dr',15,2)->default('0.00');
            $table->decimal('borrowings_cr',15,2)->default('0.00');
            $table->decimal('share_prem_dr',15,2)->default('0.00');
            $table->decimal('share_prem_cr',15,2)->default('0.00');
            $table->decimal('property_plant_eqpt_dr',15,2)->default('0.00');
            $table->decimal('property_plant_eqpt_cr',15,2)->default('0.00');
            $table->decimal('cbo_reserve_dr',15,2)->default('0.00');
            $table->decimal('cbo_reserve_cr',15,2)->default('0.00');
            $table->decimal('revenue_reserve_dr',15,2)->default('0.00');
            $table->decimal('revenue_reserve_cr',15,2)->default('0.00');
            $table->decimal('ashes_shares_dr',15,2)->default('0.00');
            $table->decimal('ashes_shares_cr',15,2)->default('0.00');
            $table->decimal('ashes_cooperate_dr',15,2)->default('0.00');
            $table->decimal('ashes_cooperate_cr',15,2)->default('0.00');
            $table->decimal('aswap_shares_dr',15,2)->default('0.00');
            $table->decimal('aswap_shares_cr',15,2)->default('0.00');
            $table->decimal('aswap_member_welfare_contrib_dr',15,2)->default('0.00');
            $table->decimal('aswap_member_welfare_contrib_cr',15,2)->default('0.00');
            $table->decimal('aswap_cooperate_dr',15,2)->default('0.00');
            $table->decimal('aswap_cooperate_cr',15,2)->default('0.00');
            $table->decimal('indiv_savings_dr',15,2)->default('0.00');
            $table->decimal('indiv_savings_cr',15,2)->default('0.00');
            $table->decimal('voluntary_savings_dr',15,2)->default('0.00');
            $table->decimal('voluntary_savings_cr',15,2)->default('0.00');
            $table->decimal('group_savings_dr',15,2)->default('0.00');
            $table->decimal('group_savings_cr',15,2)->default('0.00');
            $table->decimal('compulsory_savings_dr',15,2)->default('0.00');
            $table->decimal('compulsory_savings_cr',15,2)->default('0.00');
            $table->decimal('fixed_savings_dr',15,2)->default('0.00');
            $table->decimal('fixed_savings_cr',15,2)->default('0.00');
            $table->decimal('shares_dr',15,2)->default('0.00');
            $table->decimal('shares_cr',15,2)->default('0.00');
            $table->decimal('building_shares_dr',15,2)->default('0.00');
            $table->decimal('building_shares_cr',15,2)->default('0.00');
            $table->decimal('income_cr',15,2)->default('0.00');
            $table->decimal('income_dr',15,2)->default('0.00');
            $table->decimal('loan_insur_fund_dr',15,2)->default('0.00');
            $table->decimal('loan_insur_fund_cr',15,2)->default('0.00');
            $table->decimal('expenditure_dr',15,2)->default('0.00');
            $table->decimal('expenditure_cr',15,2)->default('0.00');
            $table->decimal('dividends_dr',15,2)->default('0.00');
            $table->decimal('dividends_cr',15,2)->default('0.00');
            $table->decimal('supplier_dr',15,2)->default('0.00');
            $table->decimal('supplier_cr',15,2)->default('0.00');
            $table->decimal('Cash_Incustody_dr',15,2)->default('0.00');
            $table->decimal('Cash_Incustody_cr',15,2)->default('0.00');
            $table->decimal('fixed_asset_dr',15,2)->default('0.00');
            $table->decimal('fixed_asset_cr',15,2)->default('0.00');
            $table->decimal('current_Asset_dr',15,2)->default('0.00');
            $table->decimal('current_Asset_cr',15,2)->default('0.00');
            $table->decimal('debtor_dr',15,2)->default('0.00');
            $table->decimal('debtor_cr',15,2)->default('0.00');
            $table->decimal('suspense_dr',15,2)->default('0.00');
            $table->decimal('suspense_cr',15,2)->default('0.00');
            $table->decimal('cash_in_Safe_dr',15,2)->default('0.00');
            $table->decimal('cash_in_Safe_cr',15,2)->default('0.00');
            $table->decimal('provision_dr',15,2)->default('0.00');
            $table->decimal('provision_cr',15,2)->default('0.00');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trialbalancedailies');
    }
};
