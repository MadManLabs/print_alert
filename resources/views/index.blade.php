@extends('layouts.master')

@section('title', trans('index.page.title'))


@section('content')
    <div id="AppArea">
        <ul id="ListArea">

            @foreach ($devices as $device)
                <li style="cursor: pointer;" onclick="showModal({{ $device->id }})" id="{{ $device->id }}"
                    data-status="{{ $device->hasIncident }}">
                    <div class="Text">
                        <h3>{{ $device->deviceName }}</h3>
                    </div>
                    <div class="Image">
                        <svg version="1.1" viewBox="0 0 1000 1000">
                            <g>
                                <path d="M264.7,325.4c-19.3,0.7-38.3,1.1-56.9,1.1h-89.2c-12.9,0-26,2.2-39.2,6.5s-24.9,10.9-34.9,19.9s-18.3,20.4-24.7,34.4c-6.4,14-9.7,30.3-9.7,48.9v81.7h979.9v-44c0-11.5-0.2-22.2-0.5-32.3c-0.4-10-0.5-16.5-0.5-19.4c0-9.3-1.8-19.7-5.4-31.2s-9.7-22-18.3-31.7s-19.9-17.7-33.8-24.2c-14-6.4-31.7-9.7-53.2-9.7H735.3v104.2H264.6L264.7,325.4L264.7,325.4z M988.9,575.8v55.9c0,16.5,0.2,35.1,0.5,55.9c0.4,20.8,0.6,41.5,0.6,62.3c0,20.8-3.8,37.8-11.3,51c-7.5,13.2-16.8,24-28,32.3c-11.1,8.3-22.9,14-35.4,17.2c-12.5,3.2-23.8,4.8-33.8,4.8c-10,0.7-20.6,0.9-31.7,0.5c-11.1-0.3-21.7-0.5-31.7-0.5h-34.4l-48.3-137.5H263.6l-47.3,137.5h-67.7c-14.3,0-30.4-0.4-48.3-1.1c-17.9,0-32.6-3.4-44-10.2c-11.5-6.8-20.6-15-27.4-24.7c-6.8-9.7-11.6-20.2-14.5-31.7c-2.9-11.5-4.3-22.2-4.3-32.3V575.8H988.9L988.9,575.8z M137.9,643.4c-8.6,0-16.1,3-22.6,9.1c-6.4,6.1-9.7,13.8-9.7,23.1s3.2,17,9.7,23.1c6.4,6.1,14,9.1,22.6,9.1c9.3,0,17.2-3,23.7-9.1c6.5-6.1,9.7-13.8,9.7-23.1s-3.2-17-9.7-23.1C155.1,646.5,147.3,643.4,137.9,643.4z M302.3,776.7c-5.7,18.6-10.8,35.8-15.1,51.6c-3.6,13.6-7.3,26.9-11.3,39.7c-3.9,12.9-6.6,21.8-8,26.9c-1.4,5-2.5,10.4-3.2,16.1c-0.7,5.7-0.4,10.9,1.1,15.6c1.4,4.7,4.8,8.4,10.2,11.3c5.4,2.9,13.1,4.3,23.1,4.3h392.2c16.5,0,28.7-4.3,36.5-12.9s8.6-22.2,2.2-40.8c-3.6-9.3-7-20.2-10.2-32.8c-3.2-12.5-6.6-24.9-10.2-37.1c-3.6-13.6-7.5-27.6-11.8-41.9L302.3,776.7L302.3,776.7z M323.8,373.8v-245c0-7.9,0.9-16.1,2.7-24.7s5.4-16.3,10.8-23.1c5.4-6.8,12.7-12.4,22-16.6c9.3-4.3,21.5-6.4,36.5-6.5h202c22.2,0,40.7,5.2,55.3,15.6c14.7,10.4,22,29.2,22,56.4v243.9H323.8L323.8,373.8z"/>
                            </g>
                        </svg>
                    </div>
                    <div class="Bar">
                        <a title="{{ $device->deviceIncidentMessage }}" class="Status" title="Status"></a>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>


    <!-- BEGIN: Modal -->

    <div id="modal" class="modal">
        <div class="content-modal">
            <header class="header">
                <h1>{{ trans('index.modal.title')  }}</h1><span>{{ trans('index.modal.span') }}</span>
            </header>
            <div class="content">
                <script>
                    var incidentMessages =  <?php echo count($messages); ?>;
                    // gloabl array for evaluation
                    var evaluation = new Array(incidentMessages);
                    for (i = 0; i < incidentMessages; i++) {
                        evaluation[i] = 0;
                    }
                </script>

            @foreach ($messages as $message)
                <!-- Row One-->
                    <div class="row">
                        <div class="description">
                            <h2>{{ $message->incidentMessage }}</h2>
                            <p class="meta">{{ $message->incidentDescription }}</p>
                        </div>
                        <div class="select">
                            <div onclick="increaseEvaluation({{ $message->id }})" class="dribbble"><span></span></div>
                        </div>
                    </div>
                @endforeach

            </div>
            <footer class="footer">
                <input id="optionalText" type="text" placeholder="{{ trans('index.modal.inputPlacHolder') }}"/>

                <div class="flex">
                    <button onclick="submitIncident()" class="submit">{{ trans('index.modal.submit') }}</button>
                    <button id="delButton" onclick="deleteIncident()" class="delete">{{ trans('index.modal.deleteIncident') }}</button>
                </div>

                <a class="" onclick="hideModal()">{{ trans('index.modal.close') }}</a></footer>
        </div>
    </div>
    <!-- END: Modal -->


@stop