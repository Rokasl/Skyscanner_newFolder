<!--
    <p class="no-margin">{{ $flight->voteCountNormalized() }}</p>
    <p class="no-margin">{{ $flight->skyScannerUrl() }}</p>
-->
<div class="row result mb15" data-flight="{{ $flight->id }}">
    <div class="col-md-1">
        <button type="button"
                id="testBtn"
                class="btn btn-success btn-block"
                data-upvote="{{ $flight->id }}">
            <i class="fa fa-thumbs-up"></i>
        </button>
    </div>
    <div class="col-md-3">
        <p class="centered">{{ $flight->to }}</p>
    </div>

    <div class="col-md-5">
        <p class="centered">{{ $flight->dateFrom->toFormattedDateString() }} - {{ $flight->dateTo->toFormattedDateString() }}
        <br> <span class="smaller">{{ $flight->dateFrom->diffForHumans() }}</span></p>
    </div>

    <div class="col-md-2">
        <p class="centered">{{ $flight->price }}</p>
    </div>
    <div class="col-md-1">
        <button type="button" id="testBtnDown" class="btn btn-danger btn-block" data-downvote="{{ $flight->id }}">
            <i class="fa fa-thumbs-down"></i>
            </button>
    </div>
</div>