@extends('app')
@section('title', 'Find your next Holidays')
@section('content')

    <?php use AdamWathan\BootForms\Facades\BootForm; ?>

    <h1 class="text-center">Fly spontaneously</h1>
    <h3 class="text-center">Choose your city</h3>


    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <?= BootForm::open()->post()->action(action('IndexController@store')) ?>


            <?= BootForm::select('', 'from')->class('remote-selector')->placeholder('Your City') ?>

            {!! BootForm::submit('GO!', 'btn btn-primary btn-block') !!}

            <?= Bootform::close() ?>



        </div>

    </div>





@endsection