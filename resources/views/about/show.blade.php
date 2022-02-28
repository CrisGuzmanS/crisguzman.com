@extends('layouts.app')

@section('content')

<div class="container">
    <br><br>
    <div class="row">
        <div class="col-12 col-md-4 text-center personal-image" data-aos="fade-right" data-aos-delay="50"
            data-aos-anchor=".greeting">
            <img src="img/foto_personal.jpg" class="img-fluid rounded-circle" id="foto-personal">
        </div>
        <div class="col-12 col-md-8 mt-4" data-aos="fade-down" data-aos-delay="70" data-aos-anchor=".greeting">
            <h3 class="text-josefin text-center"><b>DESARROLLADOR <span class="text-purple">WEB</span></b></h3>
            <p>
                Soy Cristian, un programador apasionado de 24 años.
                Mi pasión es crear sistemas web que permitan facilitar las tareas diarias
                que pueden ser automatizadas, centralizadas y simplificadas. Entiendo la
                importancia de sistematizar los procesos que un negocio tiene como punto clave
                para su éxito en esta nueva era digital.
            </p>
        </div>
    </div>
    <br><br>
    <div class="row habilidades" data-aos="fade-in" data-aos-delay="90" data-aos-anchor=".greeting">
        <div class="col-12">
            @foreach ($myAbilities as $myAbilitie)
            <div class="habilidad shadow" id="{{Str::slug($myAbilitie->name)}}">
                <span>{{$myAbilitie->name}}<br>{{$myAbilitie->level}}</span>
            </div>
            @endforeach
        </div>
    </div>
    <br><br>
</div>

@endsection