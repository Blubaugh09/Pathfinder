@extends('layouts.frontend')

@section('content')
<link href="{{ asset('css/map.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
       
        <div id="map-container" class="draggable">
            <div id="map-header">Drag me</div>
            <div id="map"></div>
        </div>

        <script src="{{ asset('js/mapDiagram.js') }}"></script>

        <!-- Then load the Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoppsxETyUAT4pYNYgYPZw9qC5qNtOS4s&callback=initMap"></script>
        

        <div class="col-md-8">
           
            <!-- Container for GoJS diagram -->
            <div id="mainDiagram" style="width: 100%; height: 500px; border: 1px solid black;"></div>
            <div id="eventDiagramDiv" style="width: 800px; height: 400px; border: 1px solid black;"></div>

            <script src="https://unpkg.com/gojs/release/go.js"></script>
            <script src="{{ asset('bibleNodes/nodes.js') }}"></script>
            <script src="{{ asset('bibleNodes/links.js') }}"></script>
            <script src="{{ asset('js/myDiagram.js') }}"></script>
            <script src="{{ asset('js/eventTimelineDiagram.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            


            <script>
                window.Laravel = {!! json_encode(['userId' => auth()->id()]) !!};
            </script>
   
              
   <button id="backButton" onclick="goBack()">Back</button>
            
        </div>
    </div>
</div>

<script>
    function goBack() {
        if (myDiagram && previousState.position !== null && previousState.scale !== null) {
            // Reset diagram to its previous state
            myDiagram.scale = previousState.scale;
            myDiagram.position = previousState.position;
        }
    }
    </script>
@endsection