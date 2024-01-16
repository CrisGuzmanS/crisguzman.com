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
                ¡Hola, soy Cristian! 🚀 Soy un desarrollador apasionado. 
                Me encanta jugar con código y crear aplicaciones web que hagan la vida más fácil. 
                Trabajar en equipo me llena de energía, y siempre ando en busca de soluciones 
                innovadoras para hacer cosas asombrosas. ¡Hablemos de proyectos emocionantes 
                y demos vida a ideas geniales juntos! 🌟
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