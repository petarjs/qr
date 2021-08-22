@extends('navigation-menu')

@role('manager')
@include('navigation.links.manager')
@endrole

@role('operator')
@include('navigation.links.operator')
@endrole
