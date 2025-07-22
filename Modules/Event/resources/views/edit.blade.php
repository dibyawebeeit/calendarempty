@extends('dashboard::layouts.master')
@section('title', 'Edit Event')

@section('content')
<livewire:editevent :eventId="$id" />

@endsection