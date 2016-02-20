@extends('app')

@section('content')
    <div class="container mt30">

        <div class="row">

            <div class="col-md-9">

                <div class="panel panel-success">

                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3> Results </h3>
                        </div>

                    </div>

                    <div class="panel-body">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button"
                                            id="testBtn"
                                            class="btn btn-success fa-thumbs-up"
                                            data-loading-text=" ... ">
                                        4</button>
                                </div>
                                <div class="col-md-3">
                                    <h4>Where!</h4>
                                </div>

                                <div class="col-md-3">
                                    <h4>Date</h4>
                                </div>

                                <div class="col-md-3">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" id="testBtnDown" class="btn btn-danger fa-thumbs-down" data-loading-text=" ... ">
                                        4</button>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>


            </div>

            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3> Chat </h3>
                        </div>
                    </div>
                     <div class="panel-body">
                      <div class="panel-body">
                          MESSAGE
                      </div>


                     </div>
                </div>
                </div>

        </div>
    </div>

@endsection

@section('footer')
<script>
    $('#testBtn').click(function () {
        var cnt=4;
        var btn = $(this);
        btn.button('loading');
        setTimeout(function () {
            cnt++;
            btn.button('reset');
            btn.text('  ' + cnt);
        }, 1000);
    });

    $('#testBtnDown').click(function () {
        var cnt=4;
        var btn = $(this);
        btn.button('loading');
        setTimeout(function () {
            if (cnt > 0) {
                cnt--;
            }
            btn.button('reset');
            btn.text('  ' + cnt);
        }, 1000);
    });
</script>

@endsection