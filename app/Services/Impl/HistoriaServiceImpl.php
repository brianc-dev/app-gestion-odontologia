<?php

namespace App\Services\Impl;

use App\Models\AntFamiliares;
use App\Models\AntPersonales;
use App\Models\ExamenRadiografico;
use App\Models\Historia;
use App\Models\HistoriaOdontologica;
use App\Models\Paciente;
use App\Models\Trastornos;
use App\Services\HistoriaService;
use Illuminate\Support\Arr;

class HistoriaServiceImpl implements HistoriaService
{

    public function addPaciente(array $data): Paciente
    {

        $paciente = Paciente::create([
            'cedula' => $data['cedula'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'edad' => $data['edad'],
            'sexo' => $data['sexo'],
            'peso' => $data['peso'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'ocupacion' => $data['ocupacion'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'foto_url' => $data['foto_url'],
        ]);

        return $paciente;
    }

    public function addHistoria(Paciente $paciente, array $data): Historia
    {
        return $paciente->historia()->create($data);
    }

    public function updateHistoria(Historia $historia, array $data): Historia
    {
        $historia->updateOrFail($data);
        return $historia;
    }

    public function addAntFamiliares(Historia $historia, array $data): AntFamiliares
    {
        return $historia->antFamiliares()->create($data);
    }

    public function updateAntFamiliares(AntFamiliares $antFamiliares, array $data): AntFamiliares
    {
        $antFamiliares->updateOrFail($data);
        return $antFamiliares;
    }


    public function addAntPersonales(Historia $historia, array $data): AntPersonales
    {
        return $historia->antPersonales()->create($data);
    }

    public function updateAntPersonales(AntPersonales $antPersonales, array $data): AntPersonales
    {
        $antPersonales->updateOrFail($data);
        return $antPersonales;
    }

    public function addTrastornos(Historia $historia, array $data): Trastornos
    {
        return $historia->trastornos()->create($data);
    }

    public function updateTrastornos(Trastornos $trastornos, array $data): Trastornos
    {
        $trastornos->updateOrFail($data);
        return $trastornos;
    }

    public function addHistoriaOdontologica(Historia $historia, array $data): HistoriaOdontologica
    {
        return $historia->historiaOdontologica()->create($data);
    }

    public function updateHistoriaOdontologica(HistoriaOdontologica $historiaOdon, array $data): HistoriaOdontologica
    {
        $historiaOdon->updateOrFail($data);
        return $historiaOdon;
    }

    public function addExamenRadiografico(HistoriaOdontologica $historiaOdon, array $data): ExamenRadiografico
    {
        return $historiaOdon->examenRadiografico()->create($data);
    }

    public function updateExamenRadiografico(ExamenRadiografico $examenRadio, array $data): ExamenRadiografico
    {
        $examenRadio->updateOrFail($data);
        return $examenRadio;
    }
}

