<?php

namespace App\Common\Providers;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Spark\Plan;
use Spark\Spark;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Spark::billable(Company::class)->resolve(function (Request $request) {
            return $request->user()->company;
        });

        Spark::billable(Company::class)->authorize(function (Company $billable, Request $request) {
            $user = $request->user();

            if (!$user) {
                return false;
            }

            if (!$user->hasRole('manager')) {
                return false;
            }

            $company = $user->company;

            return optional($company)->id == $billable->id;
        });

        // Spark::billable(User::class)->checkPlanEligibility(function (User $billable, Plan $plan) {
            // if ($billable->projects > 5 && $plan->name == 'Basic') {
            //     throw ValidationException::withMessages([
            //         'plan' => 'You have too many projects for the selected plan.'
            //     ]);
            // }
        // });
    }
}
