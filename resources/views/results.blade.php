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

                            <div class="row result mb15">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                    <p>Destination</p>
                                </div>

                                <div class="col-md-5">
                                    <p>Date</p>
                                </div>

                                <div class="col-md-2">
                                    <p>Price</p>
                                </div>
                                <div class="col-md-1">

                                </div>

                            </div>

                        </div>

                        <div class="panel-body">


                            @foreach($data->flights as $flight)

                                @include('partials.result-row')
                                <hr>
                            @endforeach


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
                      <div class="panel-body comments" id="chat">
                          @foreach($comments as $comment)
                              <p>{{$comment->text}}</p>
                              <hr>
                          @endforeach
                      </div>
                       <div class="panel-body">
                           <?= BootForm::open()->post()->action(action('CommentsController@store'))->id('comments__create-form') ?>
                               {!! BootForm::hidden('group_id')->value($data->id) !!}
                               {!! BootForm::text('Message', 'text')->id('comment-input') !!}
                           <?= Bootform::close() ?>
                       </div>


                     </div>
                </div>
                </div>

        </div>
    </div>

@endsection

@section('javascript')
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

<script>
    /* Hit enter to submit comment */
    $('#comments__create-form').on('submit', function(e){
        e.preventDefault();
        var myVariable = document.querySelector('.comments').id;
        var form = $(this);
        var post_url = form.attr('action');
        var post_data = form.serialize();
        $.ajax({
            type: 'POST',
            url: post_url,
            data: post_data,
            success: function() {
                var a = document.getElementById("comment-input");
                a.value = "";
                $('#'+myVariable).load(document.URL +' #'+myVariable);

            }
        });

    })


</script>


@endsection

