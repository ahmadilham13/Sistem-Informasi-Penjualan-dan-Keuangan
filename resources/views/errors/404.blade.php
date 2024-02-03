@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@php
    $message = $exception->getMessage() ?? __('Not Found');
    if (str_starts_with($message, 'No query results for model')) {
        $message = str_replace('App\Models\\', '', $exception->getPrevious()->getModel()) . ' Not Found';
    }
@endphp
@section('message', $message)
