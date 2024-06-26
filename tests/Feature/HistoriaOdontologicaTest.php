<?php

use App\Models\Historia;
use App\Models\HistoriaOdontologica;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('test we can use factory', function () {
    $historia = Historia::factory()->forPaciente()->create();
    $historiaOdontologica = HistoriaOdontologica::factory()->for($historia)->create();

    expect($historiaOdontologica)->toBeInstanceOf(HistoriaOdontologica::class);
});

test('habitos is json', function () {
    $historia = Historia::factory()->forPaciente()->create();
    $historiaOdontologica = HistoriaOdontologica::factory()->for($historia)->create();

    expect($historiaOdontologica->habitos)->toBeJson();
});

test('plan tratamiento is an array', function () {
    $historia = Historia::factory()->forPaciente()->create();
    $historiaOdontologica = HistoriaOdontologica::factory()->for($historia)->create();

    expect($historiaOdontologica->plan_tratamiento)->toBeJson()
        ->and(json_decode($historiaOdontologica->plan_tratamiento)->plan)->toBeArray();
});

test('modificaciones plan tratamiento is an array', function () {
    $historia = Historia::factory()->forPaciente()->create();
    $historiaOdontologica = HistoriaOdontologica::factory()->for($historia)->create();

    expect($historiaOdontologica->modificaciones_plan_tratamiento)->toBeJson()
        ->and(json_decode($historiaOdontologica->modificaciones_plan_tratamiento)->modificaciones)->toBeArray();
});

test('secuencia tratamiento is an array', function () {
    $historia = Historia::factory()->forPaciente()->create();
    $historiaOdontologica = HistoriaOdontologica::factory()->for($historia)->create();

    expect($historiaOdontologica->secuencia_tratamiento)->toBeJson()
        ->and(json_decode($historiaOdontologica->secuencia_tratamiento)->secuencia)->toBeArray();
});
