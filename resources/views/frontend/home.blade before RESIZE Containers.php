@extends('layouts.frontend')
<style>
    .container {
      display: flex;
      width: 100%;
      height: 100vh; /* Use full height of the viewport */
    }
    .left-container {
      width: 75%; /* 3/4 of the container */
      display: flex;
      flex-direction: column; /* Stack children vertically */
    }
    .right-container {
      width: 25%; /* 1/4 of the container */
      display: flex;
      flex-direction: column; /* Stack children vertically */
    }
    .row {
      display: flex;
      flex: 1; /* Distribute space evenly between rows */
    }
    .left-col {
      width: 25%; /* 1/4 of the row */
      background-color: #eee; /* Just for demonstration */
    }
    .right-col {
      width: 75%; /* 3/4 of the row */
      background-color: #ddd; /* Just for demonstration */
    }
    .full-col {
      width: 100%; /* Full width of the row */
      background-color: #ccc; /* Just for demonstration */
    }
    .half-row {
    position: relative; /* Keeps the relative positioning */
    width: 100%; /* Full width of the parent */
    height: 50vh; /* Example height, or 50% of the viewport height */
    /* Removed overflow: hidden; to allow the map to be visible outside the container */
    }




  </style>
@section('content')
<link href="{{ asset('css/map.css') }}" rel="stylesheet">

<div class="container">
    <div class="left-container">
        <!-- First Row -->
        <div class="row">
            <div class="left-col" id="familyTreeDiagramDiv">
              
            </div>
            <div class="right-col" id="mainDiagram">
              
            </div>
        </div>
       
        
        <!-- Second Row -->
        <div class="row">
            <div class="full-col" id="eventDiagramDiv">
              
            </div>
        </div>
    </div>
    <div class="right-container">
        <div class="half-row" id="right-container-row1">
         
        </div>
        <div class="half-row" id="right-container-row2">
            <div id="map-container" class="draggable">
                <div id="map-header">Drag me</div>
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>

 
       
        

        <script src="{{ asset('js/mapDiagram.js') }}"></script>

        <!-- Then load the Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoppsxETyUAT4pYNYgYPZw9qC5qNtOS4s&callback=initMap"></script>
        


           
            <!-- Container for GoJS diagram -->
            
            
           

            <script src="https://unpkg.com/gojs/release/go.js"></script>
            <script src="{{ asset('bibleNodes/nodes.js') }}"></script>
            <script src="{{ asset('bibleNodes/links.js') }}"></script>
            <script src="{{ asset('js/myDiagram.js') }}"></script>
            <script src="{{ asset('js/eventTimelineDiagram.js') }}"></script>
            <script src="{{ asset('js/familyTreeGenogramDiagram.js') }}"></script>
       

            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            


            <script>
                window.Laravel = {!! json_encode(['userId' => auth()->id()]) !!};
            </script>
   
              
   <button id="backButton" onclick="goBack()">Back</button>
            

 


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

