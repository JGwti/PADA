<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/pacientes', App\Http\Controllers\PatientController::class);
    Route::get('/selectStates', [App\Http\Controllers\PatientController::class, 'getSelectStates'])->name('states');
    Route::get('/selectCities', [App\Http\Controllers\PatientController::class, 'getSelectCities'])->name('cities');
    Route::post('/selectPatient/{id}', [App\Http\Controllers\PatientController::class, 'getSelectPatient'])->name('data.patient');

    Route::resource('/usuarios', App\Http\Controllers\UserController::class);
    Route::get('/selectPsychological/{id}', [App\Http\Controllers\UserController::class, 'getSelectUser'])->name('data.psychological');
    Route::get('/selectPsychopedagogical/{id}', [App\Http\Controllers\UserController::class, 'getSelectUser'])->name('data.psychopedagogical');
    Route::post('/selectUser/{id}', [App\Http\Controllers\UserController::class, 'getSelectUser'])->name('data.user');

    Route::resource('/remision_estudiantes', App\Http\Controllers\StudentReferralController::class);
    Route::get('/remision_estudiantes/forms/{id}', [App\Http\Controllers\StudentReferralController::class, 'getReferralForms'])->name('id.forms.referral');

    Route::resource('/forms', App\Http\Controllers\FormController::class);

    Route::resource('/consents', App\Http\Controllers\ConsentController::class)->only([
        'store', 'update']);
    Route::get('/consentimiento/{id}', [App\Http\Controllers\ConsentController::class, 'index'])->name('index.consent');
    Route::get('/consentimiento/create/{id}', [App\Http\Controllers\ConsentController::class, 'create'])->name('create.consent');
    Route::get('/consentimiento/show/{id}/{id_referral}', [App\Http\Controllers\ConsentController::class, 'show'])->name('show.consent');
    Route::get('/consentimiento/{id}/{id_referral}/edit', [App\Http\Controllers\ConsentController::class, 'edit'])->name('edit.consent');
    Route::delete('/consentimiento/destroy/{id}/{id_referral}', [App\Http\Controllers\ConsentController::class, 'destroy'])->name('destroy.consent');

    Route::resource('/asentimiento', App\Http\Controllers\AssentController::class)->only([
        'store', 'update']);
    Route::get('/asentimiento/{id}', [App\Http\Controllers\AssentController::class, 'index'])->name('index.assent');
    Route::get('/asentimiento/create/{id}', [App\Http\Controllers\AssentController::class, 'create'])->name('create.assent');
    Route::get('/asentimiento/show/{id}/{id_referral}', [App\Http\Controllers\AssentController::class, 'show'])->name('show.assent');
    Route::get('/asentimiento/{id}/{id_referral}/edit', [App\Http\Controllers\AssentController::class, 'edit'])->name('edit.assent');
    Route::delete('/asentimiento/destroy/{id}/{id_referral}', [App\Http\Controllers\AssentController::class, 'destroy'])->name('destroy.assent');

    Route::resource('/legal-representatives', App\Http\Controllers\LegalRepresentativeController::class)->only([
        'store', 'update']);
    Route::get('/representante/{id}', [App\Http\Controllers\LegalRepresentativeController::class, 'index'])->name('index.legal-representatives');
    Route::get('/representante/create/{id}', [App\Http\Controllers\LegalRepresentativeController::class, 'create'])->name('create.legal-representatives');
    Route::get('/representante/show/{id}/{id_referral}', [App\Http\Controllers\LegalRepresentativeController::class, 'show'])->name('show.legal-representatives');
    Route::get('/representante/{id}/{id_referral}/edit', [App\Http\Controllers\LegalRepresentativeController::class, 'edit'])->name('edit.legal-representatives');
    Route::delete('/representante/destroy/{id}/{id_referral}', [App\Http\Controllers\LegalRepresentativeController::class, 'destroy'])->name('destroy.legal-representatives');

    Route::resource('/memorandum-of-associations', App\Http\Controllers\MemorandumOfAssociationController::class)->only([
        'store', 'update']);
    Route::get('/acta_de_compromiso/{id}', [App\Http\Controllers\MemorandumOfAssociationController::class, 'index'])->name('index.memorandum-of-associations');
    Route::get('/acta_de_compromiso/create/{id}', [App\Http\Controllers\MemorandumOfAssociationController::class, 'create'])->name('create.memorandum-of-associations');
    Route::get('/acta_de_compromiso/show/{id}/{id_referral}', [App\Http\Controllers\MemorandumOfAssociationController::class, 'show'])->name('show.memorandum-of-associations');
    Route::get('/acta_de_compromiso/{id}/{id_referral}/edit', [App\Http\Controllers\MemorandumOfAssociationController::class, 'edit'])->name('edit.memorandum-of-associations');
    Route::delete('/acta_de_compromiso/destroy/{id}/{id_referral}', [App\Http\Controllers\MemorandumOfAssociationController::class, 'destroy'])->name('destroy.memorandum-of-associations');

    Route::resource('/informed-dissents', App\Http\Controllers\InformedDissentController::class)->only([
        'store', 'update']);
    Route::get('/disentimiento/{id}', [App\Http\Controllers\InformedDissentController::class, 'index'])->name('index.informed-dissents');
    Route::get('/disentimiento/create/{id}', [App\Http\Controllers\InformedDissentController::class, 'create'])->name('create.informed-dissents');
    Route::get('/disentimiento/show/{id}/{id_referral}', [App\Http\Controllers\InformedDissentController::class, 'show'])->name('show.informed-dissents');
    Route::get('/disentimiento/{id}/{id_referral}/edit', [App\Http\Controllers\InformedDissentController::class, 'edit'])->name('edit.informed-dissents');
    Route::delete('/disentimiento/destroy/{id}/{id_referral}', [App\Http\Controllers\InformedDissentController::class, 'destroy'])->name('destroy.informed-dissents');

    Route::resource('/case-closures', App\Http\Controllers\CaseClosureController::class)->only([
        'store', 'update']);
    Route::get('/cierre-caso/{id}', [App\Http\Controllers\CaseClosureController::class, 'index'])->name('index.case-closures');
    Route::get('/cierre-caso/create/{id}', [App\Http\Controllers\CaseClosureController::class, 'create'])->name('create.case-closures');
    Route::get('/cierre-caso/show/{id}/{id_referral}', [App\Http\Controllers\CaseClosureController::class, 'show'])->name('show.case-closures');
    Route::get('/cierre-caso/{id}/{id_referral}/edit', [App\Http\Controllers\CaseClosureController::class, 'edit'])->name('edit.case-closures');
    Route::delete('/cierre-caso/destroy/{id}/{id_referral}', [App\Http\Controllers\CaseClosureController::class, 'destroy'])->name('destroy.case-closures');

    Route::resource('/initial-psychological-assessmen', App\Http\Controllers\InitialPsychologicalAssessmentController::class)->only([
        'store', 'update']);
    Route::get('/initial-psychological-assessmen/{id}', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'index'])->name('index.initial.psychological');
    Route::get('/initial-psychological-assessmen/create/{id}', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'create'])->name('create.initial.psychological');
    Route::get('/initial-psychological-assessmen/show/{id}/{id_referral}', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'show'])->name('show.initial.psychological');
    Route::get('/initial-psychological-assessmen/{id}/{id_referral}/edit', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'edit'])->name('edit.initial.psychological');
    Route::delete('/initial-psychological-assessmen/destroy/{id}/{id_referral}', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'destroy'])->name('destroy.initial.psychological');

    Route::resource('/individual-trackings', App\Http\Controllers\IndividualTrackingController::class)->only([
        'store', 'update']);
    Route::get('/individual-trackings/{id}', [App\Http\Controllers\IndividualTrackingController::class, 'index'])->name('index.individual.trackings');
    Route::get('/individual-trackings/create/{id}', [App\Http\Controllers\IndividualTrackingController::class, 'create'])->name('create.individual.trackings');
    Route::get('/individual-trackings/show/{id}/{id_referral}', [App\Http\Controllers\IndividualTrackingController::class, 'show'])->name('show.individual.trackings');
    Route::get('/individual-trackings/{id}/{id_referral}/edit', [App\Http\Controllers\IndividualTrackingController::class, 'edit'])->name('edit.individual.trackings');
    Route::delete('/individual-trackings/destroy/{id}/{id_referral}', [App\Http\Controllers\IndividualTrackingController::class, 'destroy'])->name('destroy.individual.trackings');

    Route::resource('/impact_measurement', App\Http\Controllers\ImpactMeasurementInstrumentController::class)->only([
        'store', 'update']);
    Route::get('/impact_measurement/{id}', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'index'])->name('index.impact.measurement');
    Route::get('/impact_measurement/create/{id}', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'create'])->name('create.impact.measurement');
    Route::get('/impact_measurement/show/{id}/{id_referral}', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'show'])->name('show.impact.measurement');
    Route::get('/impact_measurement/{id}/{id_referral}/edit', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'edit'])->name('edit.impact.measurement');
    Route::delete('/impact_measurement/destroy/{id}/{id_referral}', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'destroy'])->name('destroy.impact.measurement');


    Route::get('remision_estudiantes/PDF/{id}',[ App\Http\Controllers\StudentReferralController::class, 'pdf'])->name('referral.PDF');
    Route::get('consentimientos/PDF/{id}/{id_referral}', [App\Http\Controllers\ConsentController::class, 'pdf'])->name('consent.PDF');
    Route::get('asentimientos/PDF/{id}/{id_referral}', [App\Http\Controllers\AssentController::class, 'pdf'])->name('assent.PDF');
    Route::get('representante/PDF/{id}/{id_referral}', [App\Http\Controllers\LegalRepresentativeController::class, 'pdf'])->name('legal-representatives.PDF');
    Route::get('acta_de_compromiso/PDF/{id}/{id_referral}', [App\Http\Controllers\MemorandumOfAssociationController::class, 'pdf'])->name('memorandum-of-associations.PDF');
    Route::get('cierre-caso/PDF/{id}/{id_referral}', [App\Http\Controllers\CaseClosureController::class, 'pdf'])->name('case-closures.PDF');
    Route::get('disentimiento/PDF/{id}/{id_referral}', [App\Http\Controllers\InformedDissentController::class, 'pdf'])->name('informed-dissents.PDF');
    Route::get('valoracion-psicologica/PDF/{id}/{id_referral}', [App\Http\Controllers\InitialPsychologicalAssessmentController::class, 'pdf'])->name('initial.psychological.PDF');
    Route::get('individual-trackings/PDF/{id}/{id_referral}', [App\Http\Controllers\IndividualTrackingController::class, 'pdf'])->name('individual.trackings.PDF');
    Route::get('impact-measurement/PDF/{id}/{id_referral}', [App\Http\Controllers\ImpactMeasurementInstrumentController::class, 'pdf'])->name('impact.measurement.PDF');



});

