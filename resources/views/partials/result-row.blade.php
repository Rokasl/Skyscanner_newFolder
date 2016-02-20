<div class="row result mb15" data-flight="{{ $flight->id }}">
    <div class="col-md-1">
        <button type="button"
                id="testBtn"
                class="btn btn-success btn-block"
                data-loading-text=" ... ">
            <i class="fa fa-thumbs-up"></i>
            {{ $flight->votes()->whereType(1)->count() }}
        </button>
    </div>
    <div class="col-md-3">
        <p>{{ $flight->to }}</p>
    </div>

    <div class="col-md-5">
        <p>{{ $flight->dateFrom->toFormattedDateString() }} - {{ $flight->dateTo->toFormattedDateString() }} ({{ $flight->dateFrom->diffForHumans() }} ) </p>
    </div>

    <div class="col-md-2">
        <p>{{ $flight->price }}</p>
    </div>
    <div class="col-md-1">
        <button type="button" id="testBtnDown" class="btn btn-danger btn-block" data-loading-text=" ... ">
            <i class="fa fa-thumbs-down"></i>
            {{ $flight->votes()->whereType(0)->count() }}
            </button>
    </div>

</div>