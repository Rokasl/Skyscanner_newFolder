@extends('app')
@section('title', 'Find your next Holidays')
@section('content')

    <?php use AdamWathan\BootForms\Facades\BootForm; ?>

    <h1 class="text-center mb15" style="margin-top: 8%;">Fly spontaneously</h1>
    <h3 class="text-center" style="margin-bottom: 10%">Choose your city</h3>


    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <?= BootForm::open()->post()->action(action('IndexController@store')) ?>


            <?= BootForm::select('', 'from')->class('remote-selector')->style('    height: 30px;')->placeholder('Where are you flying from?') ?>

            {!! BootForm::submit('GO!', 'btn btn-sky btn-block') !!}

            <?= Bootform::close() ?>



        </div>

    </div>





@endsection